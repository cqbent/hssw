wp.domReady( () => {

	wp.blocks.registerBlockStyle( 'core/image', [
		{
			name: 'fullwidth',
			label: 'Full width',
		},
		{
			name: 'portrait',
			label: 'Portrait size',
		}
	]);
	wp.blocks.registerBlockStyle( 'core/paragraph', [
		{
			name: 'fullwidth',
			label: 'Full width',
		},
		{
			name: 'background-orange',
			label: 'Orange background',
		}
	]);
	wp.blocks.registerBlockStyle( 'core/list', [
		{
			name: 'column-list-two',
			label: 'Two column list',
		},
		{
			name: 'column-list-three',
			label: 'Three column list',
		}
	]);
} );
