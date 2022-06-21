/**
 * External dependencies
 */
import { get, times, slice, assign, escape, includes } from 'lodash';
import withSelect from './withSelect';
import allowedBlocks from './allowedBlocks';

/**
 * WordPress dependencies
 */
const { __ } = wp.i18n;
const { addFilter } = wp.hooks;
const { Fragment } = wp.element;
const { createHigherOrderComponent } = wp.compose;
const { InspectorControls } = wp.blockEditor;
const { PanelBody, BaseControl, HorizontalRule, ToggleControl, TextControl, RangeControl } = wp.components;

/**
 * Used to modify the block’s edit component.
 * It receives the original block BlockEdit component and returns a new wrapped component.
 *
 * @param  	{Function} 	BlockEdit 		Original component.
 * @return 	{string}            		Wrapped component.
 */
const addControls = createHigherOrderComponent( ( BlockEdit ) => {
	return withSelect( ( { ...props } ) => {
		const { attributes, setAttributes, isSelected, getSelectedBlock } = props;

		return (
			<Fragment>
				<BlockEdit { ...props } />
				{ isSelected && (
					<Fragment>
						{ includes( allowedBlocks, getSelectedBlock.name ) && (
							<InspectorControls>
								<PanelBody
									title={ __( 'Animation', 'blastec' ) }
									initialOpen={ false }
								>
									<Fragment>
										<HorizontalRule />
										<BaseControl>
											<ToggleControl
												label={ __( 'Include Animation', 'block-data-attribute' ) }
												value={ props.animatedElementBool }
												onChange={ ( value ) => setAttributes( { animatedElementBool: value } ) }
												checked={ props.attributes.animatedElementBool }
											/>
											{ props.attributes.animatedElementBool &&
											<RangeControl
												label={ __( 'Time Offset (ms)', 'blastec' ) }
												min={0}
												max={1000}
												value={ props.attributes.animatedElementOffset }
												onChange={ ( value ) => setAttributes( { animatedElementOffset: value } ) }
											/>
											}
										</BaseControl>
									</Fragment>
		
								</PanelBody>
							</InspectorControls>
						) }
					</Fragment>
				) }
			</Fragment>
		);
	} );
}, 'addControls' );
addFilter( 'editor.BlockEdit', 'wp-block-animations/controls', addControls );
