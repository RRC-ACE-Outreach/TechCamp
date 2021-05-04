### Red River College's Applied Computer Education Department presents  
## Tech Camp
# Part 1: Web Development

#### Follow along by video recordings on the [Red River College ACE - YouTube channel](https://www.youtube.com/channel/UC4h_O-Re8zIQ5FZTIcsrN0g).

### Let's Get Started
Prior to this session, you should have completed all of the set-up steps in [these instructions](https://github.com/RRC-ACE-Outreach/TechCamp/blob/main/TechCamp%20-%20Web%20App/0%20Before%20You%20Start%20Demo.md). If you did not, you should still be able to continue by completing steps 1-3 to create a Goorm container.

Be sure to have Goorm open, it should look something like this. (My container name is _MyTechCamp_. Yours may be different.)
![image](https://user-images.githubusercontent.com/2661661/117020466-16b93e00-acbc-11eb-9b5f-073c79ed1387.png)

### Starting your Servers

If you completed the set-up steps on a previous day, you will have to start your web server (Apache). 

Find the terminal window near the bottom of your screen:

![image](https://user-images.githubusercontent.com/2661661/117022150-9c89b900-acbd-11eb-915b-0749fb3d7048.png)


Type this command in the terminal window and hit enter: 
```
service apache2 restart
```


### Where do the files live?

#### Expand the container

In the PROJECT pane, expand the folder by clicking on the arrow beside your container name:

![image](https://user-images.githubusercontent.com/2661661/117015780-ac060380-acb7-11eb-997e-a2fc4c8ebae9.png)

#### Add starting code to the index.php file

#### Double Click on index.php to open it (it will look like this):
![image](https://user-images.githubusercontent.com/2661661/117017131-f936a500-acb8-11eb-8600-595ce444c46a.png)

#### Copy the following code and paste it so that it replaces all of the code in your index.php file:
```html
<!-- Security Step 1 - Paste Above -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Pokedex</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div id="container">
  <!-- Security Step 2 - Paste Below -->

    <h1>Add a New Pokemon</h1>
      <!--Insert Form Here -->

    <h1>Pokedex Roll Call</h1>
      <ul>
        <!--Listing of pokemons -->

      </ul>
  </div>
</body>
</html>
```

#### HTML  
HTML stands for HyperText Markup Language. HTML is a markup language that is used to describe the structure of web pages.

But what is HTML? HTML is made up of `<elements>` which are used to describe the semantics of the page. *Semantics* refers to the meaning of the different elements. For example: **h1** through **h6** elements are used to describe headings; **p** elements are used to denote paragraphs.

*A quick note:*
We are building this website using a PHP stack, that means that if we wanted to, we could use the PHP scripting language in this file. 

This index.php file has a file extension of *.php.* In other words, the filename ends with a ".php" suffix.

A *.html* file would have worked for this part of the demo, because we are only using HTML tags, but no PHP code... yet!

Let's look at the code we pasted into the index.php file...

### That's great, but what does it look like?
Copy the URL under the menu item *Project > Running URL and Port* (or just click the launch button).

Paste the URL into a new tab/window in your browser and press Enter.

This is what your web page looks like!
You can see how the browser renders changes and additions you make to the HTML markup by simply saving the index.php file that contains the code, and then refreshing the browser tab that is requesting your web page from your Apache web server.

### Different levels of headings
Let's change the content in the first `<h1>` element. This is a *level 1 heading* element and is usually used for the main heading or title of a web page. Note that the element has a start tag and an end tag. The end tag has a forward slash: `</h1>`.

Change the content, save the file in Goorm, and then refresh your viewing page in the browser. You should see your updated content in the heading.

Try changing to different heading tags. **h1** through **h6** are level one through level six headings. Change it back to an **h1** afterward.

```html
<h1>Add a New Pokemon</h1>
```

### Now for some style!
Next we will add a CSS (Cascading Style Sheets) file to our website. Add a new file to your project folder by pressing the **+** button at the top of the PROJECT pane.

Name your file `styles.css`

#### Copy and paste this code into the styles.css file and then save the file.
``` css
body,form,input,h1,label,div,ul,li{
  margin: 0;
  padding: 0;
}

body {
  font-size: 18px;
  line-height: 1.6;
  background-color: lightgrey;
}

body,
form, input {
  font-family: Cambria, "Hoefler Text", Utopia, "Liberation Serif", Times, "Times New Roman", serif;
}

  #container{
      color: #444;
      background-color: #FFF;
      border: 1px solid grey;
      margin: 3em auto;
      max-width: 750px;  
      padding: 0 3em 3em;
  }

    h1{
      line-height: 1.2;
      margin-top: 10px;
      text-shadow: 1px 1px 2px #AAA;
    }

/*  Insert form styles here */

    ul{
      width: 600px;
      padding: 0;
      margin: .5em auto;
      list-style: none;
    }

    ul li{
      margin: 1em;
      border: 1px solid #FFF;
      background-color: #EEE;
      height: 55px;
      line-height: 55px;
      padding-left: 44px;
      font-size: 1.3em;
      box-shadow: 1px 1px 2px #AAA;
    }
```

### CSS  
Cascading Style Sheets are responsible for making your webpages look good. Colors, fonts, positioning and spacing can all be modified using CSS.

HTML is responsible for the content; CSS is responsible for the presentation.

Let’s look at styles.css. The *body selector* tells the browser how to style everyting that is in the `<body>` HTML element. Let’s change a few things and see what happens.

Modify the value of the background-color property of the body. Colors can be specified using color names (e.g. Blue, Orange, DarkKhaki), or using HEX values (e.g. #8FBC8F), or [other methods.](https://www.w3schools.com/html/html_colors.asp)

```css
body {
  font-size: 18px;
  line-height: 1.6;
  background-color: TryAColorHere;
}
```

### Back to the HTML  
Our goal for this page is to display a list of Pokemon.
Find the `<ul>` element (this is an *unordered list*), and let’s start adding some Pokemon!
Save your PHP file and refresh the browser tab to see the updated content in your web page.
```html
<ul>
  <!--Listing of pokemons -->
  <li>Bulbasaur</li>
  <li>Ivysaur</li>
  <li>Venusaur</li>
  <li>Charmander</li>
</ul>
```

### Adding a Form  
Wouldn’t it be great not to have to edit HTML to add new Pokemon?
We could have users add Pokemon using a form on the web page. That’s what we’re going to add here.<br>

This is “front-end development”; in the next session we will connect the form to a database which will be used to store the Pokemon data! (This is the "back-end" part.)

Copy and paste the following code into the index.php file, below the *Add a New Pokemon* `<h1>` element.

```html
<form method="post" action="#">
  <div>
    <label for="name">Name</label>
      <input name="column1" id="column1">
  </div>
  <div>
    <label for="name">Hit Points</label>
    <input type="number" min="0" name="column2" id="column2" >
  </div>
  <div>
    <label for="name">Attack</label>
    <input type="number" min="0" name="column3" id="column3" >
  </div>
  <div>
    <label for="name">Defense</label>
    <input type="number" min="0" name="column4" id="column4" >
  </div>
  <div>
    <label for="name">Speed</label>
    <input type="number" min="0" name="column5" id="column5" >
  </div>
  <div>
    <label></label>
    <input type="submit" value="Create" />
  </div>			
</form>
```

### Back to the CSS  
That doesn’t look so hot does it? Remember CSS is responsible for the presentation.<br>
So, let's paste the following code into our styles.css file. This CSS code styles the `<form>` element and its child elements like the labels, input elements and the submit button.

```css
form{
  box-sizing: border-box;
  width: 700px;
  margin: 1em auto;
  padding: 5px;
  -moz-column-count: 2;
  column-count: 2;
  text-align: center;
  border: 1px solid #FFF;
  box-shadow: 1px 1px 2px #AAA;
}

  form label {
    display: inline-block;
    text-align: left;
    width: 90px;
  }

  form div{
    height: 40px;
  }

    form div input{
      height: 30px;
      font-size: 18px;
      width: 190px;
    }

  form input[type="submit"]{
    width: 190px;
    background-color: #DDD;
    font-size: 1.1em;
  }
```

### Play Time  
With the time we have left, experiment with your web page.<br>

Maybe copy and paste the unordered list (`<ul>`) of Pokemon and then modify the contents to be a list of something else.<br>

If you like, you could try some other [HTML elements.](https://www.w3schools.com/html/html_elements.asp)<br>

Also try changing colors in the CSS file as well. Have fun and feel free to ask questions!

### If you did not complete all of the set-up steps before starting this module, please work through the rest of the steps (continuing at Step 4) in **[Before you Start](0%20Before%20You%20Start%20Demo.md)** now.

---
## That's all for Part 1: Web Development!

# Links
**Coming up: [Part 2: Adding a Database](2%20Database%20Demo.md)**  
**Return to [Web App Landing Page](../README.md)**
