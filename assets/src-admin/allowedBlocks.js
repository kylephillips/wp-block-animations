const { applyFilters } = wp.hooks;
const allowedBlocksArray = [ 'core/paragraph', 'core/heading', 'core/button', 'core/buttons', 'core/quote', 'core/group', 'core/columns', 'core/column', 'core/list', 'core/separator' ];
const allowedBlocks = applyFilters('wp-block-animations.allowedBlocks', allowedBlocksArray)
export default allowedBlocks;