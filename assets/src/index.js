/**
* Animated Block Elements on Scroll
* Defined by data-attributes added by plugin in editor
*/
var BlockAnimations = function()
{
	const self = this;
	self.elements = [];

	self.selectors = {
		element : '[data-animated]', // The element being animated
		timeOffset : 'data-animated', // How long to wait to animate in milliseconds
		cssClass : 'data-animated-class', // The CSS Class to add, defaults to animated-standard
		topOffset : 'data-animated-top-offset' // How far from the top to add animation (float percentage)
	}

	self.bindEvents = function()
	{
		document.addEventListener('DOMContentLoaded', function(){
			self.addClasses();
			self.animateElements();
		});
		window.addEventListener('scroll', function(){
			self.animateElements();
		});
	}

	/**
	* Add the appropriate CSS class(es) to the elements
	*/
	self.addClasses = function()
	{
		self.elements = document.querySelectorAll(self.selectors.element);
		[...self.elements].forEach(function(el){
			let cssClass = el.getAttribute(self.selectors.cssClass);
			if ( typeof cssClass == 'undefined' || cssClass == '' || !cssClass ) el.classList.add('animated-standard');
		});
	}

	/**
	* Animate the elements on scroll
	*/
	self.animateElements = function()
	{
		let elementBounds, elementOffset, timeOffset, topOffset, animateAt;

		[...self.elements].forEach(function(el){

			elementBounds = self.getElementOffset(el);
			elementOffset = elementBounds.top - window.scrollY;
			
			timeOffset = el.getAttribute(self.selectors.timeOffset);
			topOffset = el.getAttribute(self.selectors.topOffset);

			if ( typeof timeOffset === 'undefined' || timeOffset === '' || !timeOffset ) timeOffset = 0;
			if ( typeof topOffset === 'undefined' || topOffset === '' || !topOffset ) topOffset = .9;

			timeOffset = parseInt(timeOffset);
			topOffset = parseFloat(topOffset);
			
			animateAt = window.innerHeight * topOffset;

			if ( elementOffset < animateAt ) {
				setTimeout(function(){
					el.classList.add('active');
				}, timeOffset);
			} else {
				setTimeout(function(){
					if ( block_animations.disable_scroll_up !== '1' ) el.classList.remove('active');
				}, timeOffset);
			}
		});
	}

	/**
	* Get an element's offset (takes scrolling into account)
	* @param element - DOM element
	*/
	self.getElementOffset = function(element)
	{
	    var de = document.documentElement;
	    var box = element.getBoundingClientRect();
	    var top = box.top + window.pageYOffset - de.clientTop;
	    var left = box.left + window.pageXOffset - de.clientLeft;
	    return { top: top, left: left };
	}

	return self.bindEvents();
}
new BlockAnimations;