const allowedCoreBlocks = [ 
	'core/paragraph', 
	'core/heading', 
	'core/button', 
	'core/buttons', 
	'core/quote', 
	'core/group', 
	'core/columns', 
	'core/column', 
	'core/list', 
	'core/separator'
];
const allowedBlocks = wp.hooks.applyFilters('wp_block_animations_allowed_blocks', allowedCoreBlocks);
export default allowedBlocks;