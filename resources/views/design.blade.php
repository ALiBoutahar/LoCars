<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Design</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link href="https://unpkg.com/grapesjs/dist/css/grapes.min.css" rel="stylesheet">
  <script src="https://unpkg.com/grapesjs"></script>
  <style>
    #gjs {
      border: 3px solid #444;
    }
    .custom_style
    {
      width: 100px;
      height: 100px;
      background-color: red;
    }
  </style>
</head>
<body>
  <div id="gjs"></div>
  <script>
    const editor = grapesjs.init({
      container: '#gjs',
      fromElement: true,
      storageManager: false,
      blockManager: {
        blocks: [
          {
            id: 'section',
            label: 'Section',
            content: '<section><h1>Section</h1><p>This is a section</p></section>',
          },
          {
            id: 'text',
            label: 'Text',
            content: '<div data-gjs-type="text">Insert your text here</div>',
          },
          {
            id: 'image',
            label: 'Image',
            select: true,
            content: { type: 'image' },
            activate: true,
          },
          {
            id: 'div',
            label: 'Div',
            content: '<div></div>',
          },
          {
            id: 'input',
            label: 'Input',
            content: '<input type="text" placeholder="Enter text here">',
          },
          {
            id: 'textarea',
            label: 'Textarea',
            content: '<textarea></textarea>',
          },
          {
            id: 'button',
            label: 'Button',
            content: '<button>Button</button>',
          },
          {
            id: 'link',
            label: 'Link',
            content: '<a href="#">Link</a>',
          },
          {
            id: 'paragraph',
            label: 'Paragraph',
            content: '<p>Paragraph</p>',
          },
          {
            id: 'list',
            label: 'List',
            content: '<ul><li>Item</li><li>Item</li></ul>',
          },
          {
            id: 'heading',
            label: 'Heading',
            content: '<h2>Heading</h2>',
          }
        ]
      },
      styleManager: {
        sectors: [
          {
            name: 'General',
            open: false,
            buildProps: ['float', 'display', 'position', 'top', 'right', 'left', 'bottom']
          },
          {
            name: 'Text',
            open: false,
            buildProps: ['font-family', 'font-size', 'font-weight', 'letter-spacing', 'color', 'line-height', 'text-align']
          },
          {
            name: 'Background',
            open: false,
            buildProps: ['background-color', 'background-image', 'background-repeat', 'background-attachment', 'background-position']
          },
          {
            name: 'Border',
            open: false,
            buildProps: ['border', 'border-radius', 'border-color', 'border-width']
          },
          {
            name: 'Margin',
            open: false,
            buildProps: ['margin', 'margin-top', 'margin-right', 'margin-bottom', 'margin-left']
          },
          {
            name: 'Padding',
            open: false,
            buildProps: ['padding', 'padding-top', 'padding-right', 'padding-bottom', 'padding-left']
          },
          {
            name: 'Dimensions',
            open: false,
            buildProps: ['width', 'min-width', 'max-width', 'height', 'min-height', 'max-height']
          },
          {
            name: 'Flex',
            open: false,
            buildProps: ['display'],
            properties: [ 
              {
                type: 'select',
                name: 'Display',
                property: 'display',
                defaults: 'block',
                options: [
                  { value: 'block', name: 'Block' },
                  { value: 'inline', name: 'Inline' },
                  { value: 'inline-block', name: 'Inline Block' },
                  { value: 'flex', name: 'Flex' },
                  { value: 'inline-flex', name: 'Inline Flex' },
                  { value: 'none', name: 'None' },
                ],
              },
              {
                type: 'select',
                name: 'justify-content',
                property: 'justify-content',
                defaults: 'flex-start',
                options: [
                  { value: 'flex-start', name: 'flex-start' },
                  { value: 'center', name: 'center' },
                  { value: 'flex-end', name: 'flex-end' },
                  { value: 'space-between', name: 'space-between' },
                  { value: 'space-around', name: 'space-around' },
                ],
              },
              {
                type: 'select',
                name: ' align-items',
                property: ' align-items',
                defaults: 'center',
                options: [
                  { value: 'flex-start', name: 'flex-start' },
                  { value: 'center', name: 'center' },
                  { value: 'flex-end', name: 'flex-end' },
                  { value: 'baseline', name: 'baseline' },
                  { value: 'stretch', name: 'stretch' },
                ],
              },
              {
                type: 'select',
                name: ' align-content',
                property: ' align-content',
                defaults: 'center',
                options: [
                  { value: 'center', name: 'center' },
                  { value: 'flex-start', name: 'flex-start' },
                  { value: 'flex-end', name: 'flex-end' },
                  { value: 'stretch', name: 'stretch' },
                  { value: 'space-around', name: 'space-around' },
                  { value: 'space-between', name: 'space-between' },
                ],
              },
              {
                type: 'select',
                name: 'flex-direction',
                property: 'flex-direction',
                defaults: 'column',
                options: [
                  { value: 'column', name: 'column' },
                  { value: 'column-reverse', name: 'column-reverse' },
                  { value: 'row', name: 'row' },
                  { value: 'row-reverse', name: 'row-reverse' },
                ],
              },
              {
                type: 'select',
                name: 'flex-wrap',
                property: 'flex-wrap',
                defaults: 'wrap',
                options: [
                  { value: 'wrap', name: 'wrap' },
                  { value: 'nowrap', name: 'nowrap' },
                  { value: 'wrap-reverse', name: 'wrap-reverse' },
                ],
              },
            ],
          },
        ]
      },
      plugins: ['gjs-preset-webpage'],
    });
  </script>
</body>
</html>