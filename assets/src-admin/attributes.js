/**
 * External dependencies
 */
import { assign, includes, isUndefined } from 'lodash';
import allowedBlocks from './allowedBlocks';

/**
 * WordPress dependencies
 */
const { addFilter } = wp.hooks;

/**
 * Filters registered block settings, extending attributes with anchor using ID
 * of the first node.
 *
 * @param 	{Object}   blockSettings    Original block settings.
 * @return 	{Object} 			   		Filtered block settings.
 */
function addAttributes( blockSettings ) {
	if ( isUndefined( blockSettings.attributes ) || ! includes( allowedBlocks, blockSettings.name ) )
		return blockSettings;

	return assign( {}, blockSettings, {
		attributes: assign( {}, blockSettings.attributes, {
			animatedElementBool: {
				type: 'boolean',
				default: false,
			},
			animatedElementOffset: {
				type: 'number',
				default: 0,
			},
		} ),
	} );
}

addFilter( 'blocks.registerBlockType', 'wp-block-animations/attributes', addAttributes );
