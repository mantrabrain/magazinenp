( function( api ) {

	// Extends our custom "magazinenp-pro" section.
	api.sectionConstructor['magazinenp-pro'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
