# Abstraction

## Structure

There are two models:

- Project
- Task

Tasks belong to projects. Projects can have multiple tasks.

## Setup
The project includes Laravel Sail. To bring the project up, run `./vendor/bin/sail up`.

## Use

There are three endpoints:

- GET /api/projects
- POST /api/projects
- DELETE /api/projects/{project}

### Creating New Projects

To create a new project, you must `POST` to the `/api/projects` endpoint with data that looks like the following:

```json
{
    "name": "Example Project",
    "tasks": [
        {
            "title": "Task 1",
            "description": "This is a task"
        },
        {
            "title": "Task 2",
            "description": "This is also a task"
        }
    ]
}
```

## Tests
There is one test, which checks to see that a project can be created with tasks.

To run the tests, run `./vendor/bin/sail art test`.
