/* eslint-env es6 */
'use strict';

/**
 * External dependencies
 */
export const gulpPlugins = require( 'gulp-load-plugins' )();
import path from 'path';

/**
 * Internal dependencies
 */
import {
	getThemeConfig,
	configValueDefined,
} from './utils';

// Root path is where npm run commands happen
export const rootPath = process.cwd();

export const gulpPath = `${ rootPath }/gulp`;

export const gulpTestPath = `${ rootPath }/gulp/tests`;

// Dev or production
export const isProd = ( process.env.NODE_ENV === 'production' );

// get the config
const config = getThemeConfig();

// directory for the production theme
export const prodThemePath = path.normalize( `${ rootPath }/../${ config.theme.slug }` );

// directory for assets (CSS, JS, images)
export const assetsDir = `${ rootPath }/assets`;

// directory for assets (CSS, JS, images) in production
export const prodAssetsDir = `${ prodThemePath }/assets`;

// PHPCS options
export const PHPCSOptions = {
	bin: `${ rootPath }/vendor/bin/phpcs`,
	standard: `${ rootPath }/phpcs.xml.dist`,
	warningSeverity: 0,
};

// Theme config name fields and their defaults
export const nameFieldDefaults = {
	PHPNamespace: 'Avanam',
	slug: 'avanam_dev',
	name: 'Avanam_Dev',
	theme_uri: 'https://github.com/wpdesignx/rebase',
	author: 'wpdesignx',
	author_uri: 'https://github.com/wpdesignx',
	description: 'This is starter WordPress theme called Avanam. Created for theme developers to start building beautiful WordPress themes using Avanam.',
	underscoreCase: 'avanam',
	constant: 'AVANAM',
	camelCase: 'AvaNam',
	camelCaseVar: 'avaNam',
};

// Project paths
const paths = {
	assetsDir,
	browserSync: {
		dir: `${ rootPath }/BrowserSync`,
		cert: `${ rootPath }/BrowserSync/avanam-browser-sync-cert.crt`,
		caCert: `${ rootPath }/BrowserSync/avanam-browser-sync-root-cert.crt`,
		key: `${ rootPath }/BrowserSync/avanam-browser-sync-key.key`,
	},
	config: {
		themeConfig: `${ rootPath }/config/themeConfig.js`,
	},
	php: {
		src: [
			`${ rootPath }/**/*.php`,
			`!${ rootPath }/optional/**/*.*`,
			`!${ rootPath }/tests/**/*.*`,
			`!${ rootPath }/vendor/**/*.*`,
			`!${ rootPath }/node_modules/**/*.*`,
		],
		dest: `${ rootPath }/`,
	},
	styles: {
		editorSrc: [
			`${ assetsDir }/css/src/editor/**/*.scss`,
			// Ignore partial files.
			`!${ assetsDir }/css/src/**/_*.scss`,
		],
		editorSrcDir: `${ assetsDir }/css/src/editor`,
		editorDest: `${ assetsDir }/css/editor`,
		src: [
			`${ assetsDir }/css/src/**/*.scss`,
			// Ignore partial files.
			`!${ assetsDir }/css/src/**/_*.scss`,
			// Ignore editor source css.
			`!${ assetsDir }/css/src/editor/**/*.scss`,
		],
		srcDir: `${ assetsDir }/css/src`,
		dest: `${ assetsDir }/css`,
	},
	scripts: {
		src: [
			`${ assetsDir }/js/src/**/*.js`,
			// Ignore partial files.
			`!${ assetsDir }/js/src/**/_*.js`,
		],
		srcDir: `${ assetsDir }/js/src`,
		dest: `${ assetsDir }/js`,
	},
	images: {
		src: `${ assetsDir }/images/src/**/*.{jpg,jpeg,JPG,png,svg,gif,GIF}`,
		dest: `${ assetsDir }/images/`,
	},
	export: {
		src: [],
		stringReplaceSrc: [
			`${ rootPath }/style.css`,
			`${ rootPath }/languages/*.po`,
		],
	},
	languages: {
		src: [
			`${ rootPath }/**/*.php`,
			`!${ rootPath }/optional/**/*.*`,
			`!${ rootPath }/tests/**/*.*`,
			`!${ rootPath }/vendor/**/*.*`,
		],
		dest: `${ rootPath }/languages/${ nameFieldDefaults.slug }.pot`,
	},
};

// Add rootPath to filesToCopy and additionalFilesToCopy
/* eslint no-unused-vars: 0 */
const additionalFilesToCopy = configValueDefined( 'export.additionalFilesToCopy' ) ? config.export.additionalFilesToCopy : [];
const filesToCopy = configValueDefined( 'export.filesToCopy' ) ? config.export.filesToCopy : [];
for ( const filePath of filesToCopy.concat( additionalFilesToCopy ) ) {
	// Add the files to export src
	paths.export.src.push( `${ rootPath }/${ filePath }` );
}

// Override paths for production
if ( isProd ) {
	paths.php.dest = `${ prodThemePath }/`;
	paths.styles.dest = `${ prodAssetsDir }/css/`;
	paths.styles.editorDest = `${ prodAssetsDir }/css/editor/`;
	paths.scripts.dest = `${ prodAssetsDir }/js/`;
	paths.images.dest = `${ prodAssetsDir }/images/`;
	paths.languages = {
		src: `${ prodThemePath }/**/*.php`,
		dest: `${ prodThemePath }/languages/${ config.theme.slug }.pot`,
	};
}

export { paths };
