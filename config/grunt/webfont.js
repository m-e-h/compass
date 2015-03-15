// https://github.com/sapegin/grunt-webfont
module.exports = {
	options: {
		stylesheet: 'scss',
		relativeFontPath: 'fonts/',
		hashes: false,
		htmlDemo: false, // Enable for testing.
		embed: true,
		font: 'flagicons',
		types: 'eot,woff,ttf,svg',
		engine: 'node',
		templateOptions: {
			baseClass: 'fli',
			classPrefix: 'fli-',
			mixinPrefix: 'fli-'
		}
	},
	icons: {
		src: [
			'<%= paths.tmp %>icons/**/*.svg'
		],
		dest: 'font/',
		destCss: '<%= paths.authorAssets %>scss/generated'
	}
};
