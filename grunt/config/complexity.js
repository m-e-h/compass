// https://github.com/vigetlabs/grunt-complexity
module.exports = {
	options: {
		breakOnErrors: false,
		errorsOnly: false,
		cyclomatic: [3, 7, 12],
		halstead: [8, 13, 20],
		maintainability: 100,
		hideComplexFunctions: false,
		broadcast: false
	},
	assets: {
		src: ['<%= paths.authorAssets %>js/{,*/}*.js']
	},
	grunt: {
		src: ['<%= files.grunt %>', '<%= files.config %>']
	}
};
