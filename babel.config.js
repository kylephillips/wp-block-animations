module.exports = {
	presets: [ '@wordpress/babel-preset-default' ],
	plugins: [
		[
			'@babel/plugin-proposal-class-properties',
			{
				loose: true,
			},
		],
		[
			'@babel/plugin-proposal-private-methods',
			{
				loose: true,
			},
		],
		[
			'@babel/plugin-proposal-object-rest-spread',
			{
				loose: true,
				useBuiltIns: true,
			},
		],
	],
};
