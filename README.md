# OOP Counter 🔢

This project expands on the reusable Counter class built in class using JavaScript Object-Oriented Programming principles. The goal of the assignment is to turn the basic counter into a small reusable UI component while reinforcing concepts like encapsulation, state-driven UI updates, DOM manipulation inside a class, and separation of concerns.

The project also includes a documentation and demo page that explains how the component works and demonstrates multiple counters running on the same page.

## Features 🎯

Reusable Counter Component  
A JavaScript class that manages its own state and updates the UI when the count changes.

Counter Controls  
Each counter includes:
- Increment button
- Decrement button
- Reset button

Reset Console Message  
When reset is triggered, the console logs:


State Protection  
The counter cannot go below 0. The decrement method prevents negative values.

Conditional Button State  
When the count is 0, a CSS class is added to the decrement and reset buttons to visually show they are inactive.

Custom Initial Values  
Counters accept an initial value parameter (default = 0).

StepCounter Class  
An advanced counter that extends the base Counter class:
- Accepts a step parameter
- Increments/decrements by that value
- Defaults to 1
- Overrides the increment and decrement methods

## Technologies Used 🤖

HTML5  
CSS3  
JavaScript (ES6)  
JavaScript Classes & Modules  
Object-Oriented Programming (OOP)  
Git & GitHub

## How It Works ⚙️

The project begins with a Counter class that manages the counter's value and UI updates. Button actions modify the internal state, and the interface updates automatically.

A StepCounter class extends the base counter using inheritance, allowing the value to increase or decrease by a custom step amount.

Multiple counters can be instantiated on the same page with different starting values.

## GitHub Workflow 📄

- Work is completed on feature branches
- Development is never done directly on the main branch
- The final project is merged into the main branch before submission
- The repository includes the full project and documentation

Repository requirements:
- Minimum 10 commits
- Clear incremental commit messages
- Evidence of development and iteration

## Installation 🧭

To run the project locally:

- Clone this repository
- Navigate into the project directory
- Open the project in a browser or local server
- Open the main HTML file to view the documentation and demo

## Grading Breakdown 📊

Valid HTML/CSS — 1 Mark 
GitHub Best Practices — 1 Mark 
Design — 3 Marks 
OOP Implementation & State Logic — 5 Marks
Advanced OOP Implementation — 2 Marks
Conditional Class Toggling — 1 Mark  
Documentation — 2 Marks

**Total: 15% of final grade**

## Conclusion 🏁

This assignment demonstrates how Object-Oriented Programming can be used to build reusable UI components in JavaScript. By combining encapsulation, inheritance, and DOM manipulation, the counter becomes a modular and scalable component that can be reused in other projects.