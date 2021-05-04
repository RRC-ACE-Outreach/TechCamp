### Red River College's Applied Computer Education Department presents  
## Tech Camp
# Part 1: Web Development

#### Follow along by video recordings on the [Red River College ACE - YouTube channel](https://www.youtube.com/channel/UC4h_O-Re8zIQ5FZTIcsrN0g).

### Let's Get Started
Complete all of the steps in part 0 using [these instructions](https://github.com/RRC-ACE-Outreach/TechCamp/blob/main/TechCamp%20-%20Web%20App/0%20Before%20You%20Start%20Demo.md).

Your Goorm environment must be setup before starting this Web Development module.

Be sure to have Goorm open, it should look something like this: (my container name is _MyTechCamp_, yours may be different)
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

#### STEP 1 - Expand the container

In the PROJECT pane, expand the folder by clicking on the arrow beside your container name:

![image](https://user-images.githubusercontent.com/2661661/117015780-ac060380-acb7-11eb-997e-a2fc4c8ebae9.png)

#### STEP 2 - Fill out the index.php file with our starter coder

#### Double Click on index.php to open it (it may look like this by default):
![image](https://user-images.githubusercontent.com/2661661/117017131-f936a500-acb8-11eb-8600-595ce444c46a.png)

#### Copying the starter snippet below and paste it over the default text in the index.php file:
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
All webpages use HTML. It’s the language of the web.
But what is HTML? HTML is made up of <tags>, which describe the data contained within them.

*A quick note:*
*We are building this website using a PHP stack, that means that if we wanted to, we could use the PHP language in this file. 

This file has a default file suffix of .php. In other words, the file ends with the characters: ".php" 

An ".html" suffix file would have worked for this part of the demo, because we are only using basic HTML tags for now!*

Let's discuss the code snippet we pasted in: index.php

Point out the first `<h1>`.
Change the content, save, and refresh the browser.
Change to another heading tag. Just end up back with the `<h1>`.
```html
<h1>Add a New Pokemon</h1>
```

### That's great, but what does it look like?
TODO: add screenshots. Polish up descriptions
Copy the URL under "Registered URL and Port".

Paste the URL into a new tab/window in your browser.
Click on your project folder name (link).

This is the live preview for the site you are developing.

### Create your styles.css file
Add a new file to your project folder.
In the PROJECT panel, press the + icon to create a new file.
TODO: Insert screenshot

#### Name your file:
```
styles.css
```

#### Copy and paste this starter snippet into the styles.css file:
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
CSS, or Cascading Style Sheets, are responsible for making your webpages pretty.
Colours, fonts, positioning and spacing are all defined by the CSS.
HTML is responsible for the content, CSS is responsible for the presentation.
Let’s look at styles.css. Notice the body selector. Let’s change a few things and see what happens.
Modify the colours of the body tag.
```css
body {
  font-size: 18px;
  line-height: 1.6;
  background-color: #DDD;
}
```

### Back to the HTML  
Our goal for this page is to display a list of the pokemon.
Go to the `<ul>` tag, (point out that this is an unordered list), and let’s start adding some pokemons.
  Save and refresh the page in the browser.
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
Wouldn’t it be great to not have to go into the code to add a new pokemon?
Normally, a user would enter a new pokemon using a form. That’s what we’re going to add here.
Point out that this is the “front-end development” part. The next session will connect to a database and complete this portion.
We have some code already written in a file called “snippets.txt”.
Open the file, and copy and paste the code from the form. After, refresh in the browser.
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
Wow. Doesn’t look so hot does it? Remember CSS is responsible for the presentation.
Back in our snippets file, we also have some CSS coded for us.
Copy and paste that code into styles.css.
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
With the time we have left, try customizing this for yourself.
It doesn’t have to be a pokemon index. Try and think of something you’d rather have a list of, or make entries about.
Try changing colours as well. Have fun and ask questions!

### If you did not set up your virtual environment before starting this module - please take a moment to work through the rest of the steps in the **[Before you Start](0%20Before%20You%20Start%20Demo.md)**  instructional.
Recap of the rest of the steps:
• Install mySQL
• Install myPHPadmin
• Test myPHPadmin



---
## That's all for Part 1: Web Development!

# Links
**Coming up: [Part 2: Adding a Database](2%20Database%20Demo.md)**  
**Return to [Web App Landing Page](../README.md)**
