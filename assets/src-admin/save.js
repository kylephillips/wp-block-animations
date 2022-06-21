/**
 * External dependencies
 */
import { get, times, has, includes, escape, filter, assign } from 'lodash';
import allowedBlocks from './allowedBlocks';

/**
 * WordPress dependencies
 */
const { addFilter } = wp.hooks;

/**
 * A filter that applies to the block returning a WP Element in the save function.
 * This filter is used to add extra props to the root element of the save function.
 *
 * @param  	{Object} 	extraProps 		Additional props applied to save element.
 * @param  	{Object} 	blockType  		Block type.
 * @param  	{Object} 	attributes 		Current block attributes.
 * @return 	{Object}            		Filtered props applied to save element.
 */
function addSaveProps( extraProps, blockType, attributes ) {
	const extraAttrs = {};
	const { animatedElementBool: animatedElementBool, animatedElementOffset: animatedElementOffset } = attributes;

	if ( includes( allowedBlocks, blockType.name ) ) {
		if ( attributes.animatedElementBool ){
			extraAttrs['data-animated'] = ( attributes.animatedElementOffset ) ? attributes.animatedElementOffset : '';
		}
	}

	return assign( extraProps, extraAttrs );
}

addFilter( 'blocks.getSaveContent.extraProps', 'wp-block-animations/save', addSaveProps );
