// https://github.com/timmywil/grunt-bowercopy
module.exports = {
	options: {
		destPrefix: '<%= paths.bower %>',
		clean: true
	},
	css: {
		files: {
			'wp-normalize': 'wp-normalize.scss/_wp-normalize.scss'
		}
	},
	fonts: {
		options: {
			clean: false,
			report: false
		},
		files: {}
	},
	js: {
		files: {
			'fitvids/js': 'fitvids/jquery.fitvids.js',
			'accessible-menu/js': 'accessible-menu/dist',
			'sidr/js': 'sidr/jquery.sidr.min.js'
		}
	}
};
