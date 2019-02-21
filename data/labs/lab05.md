# Lab #5 - Working With Models
COMP4711 - BCIT - Winter 2019

## Lab Goals

The purpose of this lab is to help you explore and practice some of the controller 
strategies and routing techniques for CodeIgniter. 

We will continue to use gitflow workflow.

### Lab Teams

Use the same lab team & organization as last week.

### Lab Submission

Submit a readme *text* file, or a submission comment, to the lab dropbox. 
It should contain a link to your **team**'s github repository
(not its cloning URL). 

Due: this Sunday at 17:30.

### Lab Marking Guideline

A marking rubric will be attached to the lab 5 dropboxes.

# The Lab:

We're going to enhance our super simple app to provide RESTish
controllers for a student information system, moving closer
to RESTful.

### Models

Use a real model, i.e. a MYSQL database.

Provide a `data.sql` file in your `data` folder,
containing the DDL and SQL inserts for your data.

Your student and class/course models should definitely extend `Codeigniter\Model` now,
and they should be bound to the appropriate tables.

Add validation rules for your models.

Your data should have 3-4 records for each table.

You only need to "work" with one model this lab.

### Resource routes

You have a resource route already. It may need adjusting - I will consult with each group.

### Resource presenter

Have your corresponding resource controller extend `CodeIgniter\Resource]ResourceController`.
Adjust its `index` and `show` methods, refactoring your work from last lab.
Add `edit` and `update` methods, with a corresponding form view.

### Resource controllers

Refer to the `feature/resource` branch of the CI4 repo.

Have your default controller extend `CodeIgniter\Resource\ResourcePresenter`,
and bind it to one of your models.

### Testing

Make the "app" testable, for resource display and editing. Yes, that means going through to updating the table.



### Collaboration

Of course, gitflow workflow is expected!
