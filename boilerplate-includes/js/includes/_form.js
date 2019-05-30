/*
 * @file
 *
 * Available variables
 * - gulp_display
 *
 */


(function ($) {
    // 'use strict';

    $(document).ready(function () {

    });

    if (!String.prototype.trim) {
        (function() {
            // Make sure we trim BOM and NBSP
            var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
            String.prototype.trim = function() {
                return this.replace(rtrim, '');
            };
        })();
    }

    [].slice.call( document.querySelectorAll( '.input-field' ) ).forEach( function( inputEl ) {
        // in case the input is already filled..
        if( inputEl.value.trim() !== '' ) {
            classie.add( inputEl.parentNode, 'input--filled' );
        }

        // events:
        inputEl.addEventListener( 'focus', onInputFocus );
        inputEl.addEventListener( 'blur', onInputBlur );
    } );

    function onInputFocus( ev ) {
        classie.add( ev.target.parentNode, 'input--filled' );
    }

    function onInputBlur( ev ) {
        if( ev.target.value.trim() === '' ) {
            classie.remove( ev.target.parentNode, 'input--filled' );
        }
    }

	//Textarea auto resize

	var textarea = document.querySelector('textarea.input-field');

	if(textarea){
		textarea.addEventListener('keydown', autosize);
	}

	function autosize(){
		var el = this;
		setTimeout(function(){
			el.style.cssText = 'height:auto;';
			el.style.cssText = 'height:' + el.scrollHeight + 'px';
		},0);
	}

})(jQuery);
