document.addEventListener('DOMContentLoaded', function () {
    const taskForm = document.getElementById('taskForm');
    const taskTitle = document.getElementById('title');
    const taskDescription = document.getElementById('description');
    const pendingTasks = document.getElementById('pendingTasks');
    const completedTasks = document.getElementById('completedTasks');

    taskForm.addEventListener('submit', function(e) {
        e.preventDefault();
        addTask(taskTitle.value, taskDescription.value);
        taskForm.reset();
    });

    function addTask(title, description) {
        const timestamp = new Date();
        const taskWork = newTaskWork(title, description, timestamp);
        pendingTasks.appendChild(taskWork);
    }

    function newTaskWork(title, description, timestamp) {
        const li = document.createElement('li');

        const taskContent = document.createElement('div');
        taskContent.classList.add('task_content');

        const taskDescriptionDiv = document.createElement('div');
        taskDescriptionDiv.textContent = `${title} - ${description}`;
        taskContent.appendChild(taskDescriptionDiv);
        
        const timeStamp = document.createElement('div');
        timeStamp.classList.add('time_stamp');
        timeStamp.textContent = `Added: ${timestamp.toLocaleString()}`;

        taskContent.appendChild(timeStamp);
        li.appendChild(taskContent);

        const action = document.createElement('div');
        action.classList.add('action_tasks');

        const completedButton = document.createElement('button');
        completedButton.textContent = 'Complete';
        completedButton.classList.add('complete');
        completedButton.addEventListener('click', function() {
            markComplete(li);
        });

        const editButton = document.createElement('button');
        editButton.textContent = 'Edit';
        editButton.classList.add('edit');
        editButton.addEventListener('click', function() {
            editTask(li, title, description);
        });

        const deleteButton = document.createElement('button');
        deleteButton.textContent = 'Delete';
        deleteButton.classList.add('delete');
        deleteButton.addEventListener('click', function() {
            deleteTask(li);
        });

        action.appendChild(completedButton);
        action.appendChild(editButton);
        action.appendChild(deleteButton);
        li.appendChild(action);

        return li;
    }

    function markComplete(taskWork) {
        const completedTimestamp = new Date().toLocaleString();
        const taskTimestamp = taskWork.querySelector('.time_stamp');
        taskTimestamp.textContent = `Completed: ${completedTimestamp}`;
        taskWork.querySelector('.complete').remove();
        completedTasks.appendChild(taskWork);
    }

    function editTask(taskWork, oldTitle, oldDescription) {
        const newTitle = prompt("Edit title:", oldTitle);
        const newDescription = prompt("Edit description:", oldDescription);
        if (newTitle !== null && newDescription !== null) {
            taskWork.querySelector('.task_content div').textContent = `${newTitle} - ${newDescription}`;
        }
    }

    function deleteTask(taskWork) {
        taskWork.remove();
    }
});
