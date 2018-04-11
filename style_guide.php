<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
        
        <style type="text/css">
            .example {
                border: 1px solid #AAA;
                border-radius: 5px;
                
                padding: 15px 10px;
            }
            
            .banner {
                float: left;
                width: 100%;
                position: absolute;
                left: 0;
                background-color: #555;
            }
        </style>
    </head>
    <body>
        <section>
            <div class="content">
                <h1>Style Guide</h1>
                <article>
                    <h3>Typography</h2>
                    <p>The font family <strong>Lato</strong> is used universally.</p>
                    <h3>Body</h3>
                    <p>
                        The font used for body text has a size of <strong>16px</strong> and a text weight of <strong>300</strong>.
                    </p>
                    <p>
                        The paragraphs have a line height of <strong>1.5 times</strong> the font size, and a bottom margin of <strong>1 line height</strong>.
                    </p>
                    <p>
                        Emphasised text is given an <em>italic</em> style. Strong text is given a font weight of <strong>400</strong>.
                    </p>
                    <h3>Headings</h3>
                    <div class="example">
                        <h1>Heading 1</h1>
                        <h2>Heading 2</h2>
                        <h3>Heading 3</h3>
                        <h4>Heading 4</h4>
                        <h5>Heading 5</h5>
                        <h6>Heading 6</h6>
                    </div>
                    <p>
                        <strong>Heading 1</strong> has a font size of <strong>5 times</strong> the body,
                        <strong>font weight</strong> of <strong>400</strong> and letter spacing of <strong>15px</strong>.<br/>
                        A <strong>60px bottom margin</strong> separated the main heading from the rest of the page.
                    </p>
                    <p><strong>Heading 1</strong> and <strong>heading 2</strong> are centred and transformed to <strong>upper case</strong>.</p>
                    <p>
                        <strong>Heading 2</strong> and <strong>heading 3</strong> have a font size of <strong>2 times</strong> the body,
                        <strong>font weights</strong> of <strong>400</strong> and <strong>300</strong> respectively.
                    </p>
                    <p>
                        <strong>Heading 4, 5 and 6</strong> have a font size of <strong>1.5, 1.2 and 1.1 times</strong> the body text respectively,
                        and <strong>font weight</strong> of <strong>300</strong>.
                    </p>
                    <h3>Links</h3>
                    <p>
                        Hyperlinks have colour <a href="#">#B10B0F</a>, <strong>font weight 400</strong> and are <strong>underlined</strong> on hover over.
                    </p>
                    <h3>Lists</h3>
                    <div class="example">
                        <ul>
                            <li>Item 1</li>
                            <li>Item 2
                                <ul>
                                    <li>Item 2A</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <p>
                        Unordered lists are indented by <strong>20 pixels</strong>.
                        The item marker is a filled circle, and an open circle for nested lists.
                    </p>
                    <div class="example">
                        <ol>
                            <li>Item 1</li>
                            <li>Item 2
                                <ol>
                                    <li>Item 2A</li>
                                </ol>
                            </li>
                        </ol>
                    </div>
                    <p>
                        Ordered lists are indented by <strong>20 pixels</strong>.
                        A decimal item marker is used, and alphabetic marker for nested lists.
                    </p>
                    <h3>Banners</h3>
                    <div class="banner">
                        <div class="banner-heading">Main text</div>
                        <div class="banner-body"><p>Optional additional text</p></div>
                    </div>
                    <div style="clear: both; height: 540px"></div>
                    <p>
                        Banners have height <strong>500 pixels</strong>. The text is positioned <strong>150 pixels</strong> from the top of the banner.
                    </p>
                    <p>
                        The main banner text has a font size <strong>3 times</strong> the body text and <strong>font weight 400</strong>.
                    </p>
                    <h3>Header</h3>
                    <p>
                        The header has background colour <span style="background-color: #B10B0F; color: white; font-weight: 400;">#B10B0F</span> with <strong>white</strong> text.
                        Drop down menus have a <strong>half transparent</strong> background.
                    </p>
                    <p>
                        The height of the header and dropdown menus is <strong>45 pixels</strong>.
                    </p>
                    <p>
                        Header links have <strong>font weight 300</strong> and <strong>-1 pixel</strong> letter spacing.
                    </p>
                    <h3>Footer</h3>
                    <p>
                        The footer has height <strong>285 pixels</strong>.
                    </p>
                    <p>
                        The font size should be <strong>13 pixels</strong>.
                    </p>
                    <h3>Forms</h3>
                    <div class="example" style="width: 320;">
                        <form>
                            <label>Label</label>
                            <input class="text-input" type="text" placeholder="text field"/>
                            <label class="error">Error text</label>
                            <input class="button" type="button" value="Button" />
                        </form>
                    </div>
                    <p>
                        Single line form inputs have height <strong>25 pixels</strong>.
                    </p>
                    <p>
                        Text indicating an error has a <span style="color: red; font-weight: 400">red</span> color.<br/>
                        Inputs have a <strong>1 pixel</strong> border with colour <span style="color: #999; font-weight: 400">#999</span>
                    </p>
                    <p>
                        Buttons have a <strong>white</strong> background that changes to <span style="color: #D21F2D">#D21F2D</span> on hover over.</br>
                        The text colour changes to <strong style="color: white; background-color: #D21F2D;">white</strong> on hover over.
                    </p>
                </article>
            </div>
        </section>
    </body>
</html>