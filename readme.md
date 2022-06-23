# Block Animations for WordPress

Block Animations for WordPress adds block-level fade animations on scroll to WordPress blocks. An additional `Animations` editor panel is made available to the following core WordPress blocks:

* core/paragraph
* core/heading
* core/button
* core/buttons
* core/quote
* core/group
* core/columns
* core/column
* core/list
* core/separator

The front end javascript requires no dependencies.

### Adding support for additional blocks

To add the animation options to other/custom blocks, the `wp_block_animations_allowed_blocks` filter may be applied:

1. Ensure the script adding the filter is added as a dependency using the `wp_block_animations_script_dependencies` filter. [See Gist Example](https://gist.github.com/kylephillips/2b975b538fddf349b57ea76d1babbb78)

2. In the JS file enqueued, add the block name to the array of supported blocks. [See Gist Example](https://gist.github.com/kylephillips/9939c47caf43e6ad055a8e9e12a9dbfb)