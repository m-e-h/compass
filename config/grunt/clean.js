// https://github.com/gruntjs/grunt-contrib-clean
module.exports = {
	bower: {
		src: [
			'<%= paths.bower %>'
		]
	},
	composer: {
		src: [
			'<%= paths.composer %>'
		]
	},
	css: {
		src: [
			'css'
		]
	},
	dist: {
		src: [
			'<%= paths.dist %>'
		]
	},
	docs: {
		src: [
			'<%= paths.docs %>'
		]
	},
	font: {
		src: [
			'font'
		]
	},
	hybridcore: {
		src: [
			'<%= paths.hybridCore %>'
		]
	},
	flagshiplibrary: {
		src: [
			'includes/vendor/flagship-library'
		]
	},
	themehookalliance: {
		src: [
			'includes/vendor/tha-theme-hooks.php'
		]
	},
	logs: {
		src: [
			'<%= paths.logs %>'
		]
	},
	tmp: {
		src: [
			'<%= paths.tmp %>'
		]
	},
	js: {
		src: [
			'js'
		]
	},
	images: {
		src: [
			'images'
		]
	},
	languages: {
		src: [
			'languages'
		]
	},
	style: {
		src: [
			'style*.*',
			'<%= paths.tmp %>style*.*'
		]
	},
	screenshot: {
		src: [
			'screenshot.png'
		]
	}

};
