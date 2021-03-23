## Red River College's Applied Computer Education Department presents  
# Tech Camp  
  
### Intro  
Start by opening the folder with the starting files.
Open index.html in the browser. (Ask if they know the different kinds of browsers)
Discuss what we’re going to be doing to this webpage.
Now let’s edit these files. Open index.html and styles.css in Sublime.
  
### HTML  
At the root of every single webpage you’ve ever seen is HTML. It’s the language of the web.
HTML is made up of tags, which describe the data contained within them.
Point out the first `<h1>`. 
Change the content, save, and refresh the browser.
Change to another heading tag. Just end up back with the `<h1>`.
```html
<h1>Add a New Pokemon</h1>
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
Go to the <ul> tag, (point out that this is an unordered list), and let’s start adding some pokemons.
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
