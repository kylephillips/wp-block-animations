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
		document.addEventListener('scroll', function(){
			self.animateElements();
		});
	}

	/**
	* Add the appropriate CSS class(es) to the elements
	*/
	self.addClasses = function()
	{
		self.elements = document.querySelectorAll(self.selectors.element);
		for ( let i = 0; i < self.elements.length; i++ ) {
			let cssClass = self.elements[i].getAttribute(self.selectors.cssClass);
			if ( typeof cssClass == 'undefined' || cssClass == '' || !cssClass ) self.elements[i].classList.add('animated-standard');
		}
	}

	/**
	* Animate the elements on scroll
	*/
	self.animateElements = function()
	{
		for ( let i = 0; i < self.elements.length; i++ ){
			let el = self.elements[i];
			let elOffset = el.getBoundingClientRect();
			elOffset = elOffset.top - window.scrollY;
			let timeOffset = el.getAttribute(self.selectors.timeOffset);
			let topOffset = el.getAttribute(self.selectors.topOffset);

			if ( typeof timeOffset === 'undefined' || timeOffset === '' || !timeOffset ) timeOffset = '0';
			if ( typeof topOffset === 'undefined' || topOffset === '' || !topOffset ) topOffset = .9;
			
			let animateAt = window.innerHeight * topOffset;

			if ( elOffset < animateAt ) {
				setTimeout(function(){
					el.classList.add('active')
				}, timeOffset);
			} else {
				setTimeout(function(){
					el.classList.remove('active')
				}, timeOffset);
			}
		}
	}


	return self.bindEvents();
}
new BlockAnimations;