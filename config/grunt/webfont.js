// https://github.com/sapegin/grunt-webfont
module.exports = {
	options: {
		stylesheet: 'scss',
		relativeFontPath: '..font/',
		htmlDemo: false,
		font: 'flagicons',
		templateOptions: {
			baseClass: 'fli',
			classPrefix: 'fli-',
			mixinPrefix: 'fli-'
		}
	},
	icons: {
		src: [
			'<%= paths.bower %>iconic/svg/*',
			'<%= paths.authorAssets %>icons/*.svg'
		],
		dest: 'font/',
		destCss: '<%= paths.authorAssets %>scss/partials'
	}
};
