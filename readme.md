				 _              _         _ _     _   
				| |_ ___     __| | ___   | (_)___| |_ 
				| __/ _ \   / _` |/ _ \  | | / __| __|
				| || (_) | | (_| | (_) | | | \__ \ |_ 
				 \__\___/   \__,_|\___/  |_|_|___/\__|
                    

## Notes

The Code is currently still on development phase, there's could be a few bug and
may or may not having a major update next patch. The app also run in XAMPP Control Panel using php.
Feel free to design it yourself.

**Update**
*(04/02/2025)* The app is now close to being finished. With more feature 
being successfully executed the code is almost finished

## Contributing

All pull request are welcome, feel free to changes the code or design it the way you like.
For major changes, please open an issue first to discuss what you would like to change.

you can pull with this code in *command prompt*
```bash
git pull https://github.com/kamiiyaru/tdl.git
```

## Feature

- Create Task
- Checkboxes
- Date Task Created (YYYY-MM-DD)
- Edit Task 
- Self-Construct Database (coming soon)
- Priority (sort from High to Low)

## Patch Notes

**v1.0**  
**New Feature:**  
- Add delete task based on id  
  User can now delete an unwanted task, or an accidental task.  
- Add new Status boxes  
  User can now mark a finished task with a status box that shows the status of the task.  

**v1.1**  
**Changes:**  
- Change the status Boxes now it's checkboxes  
  Now users can mark the finished task with just a checkbox.  

**v1.2**  
**New Feature:**  
- Add Update/Edit Task  
- Add a header for the web  
- Add new Self-Construct Database  

**Changes:**  
- Re-Design the UI looks  
  Gives a cleaner look on the UI.  
- Re-work the table code  
  We had some problems with using a list, so we changed it into a table to avoid more bugs in the future.  

**v1.3**  
**New Feature:**  
- Add Priority  
  Users can now set the Task Priority based on how important the task is, from Low Priority to High Priority. You can set the priority based on how urgent or important your task is.  
- Add Hours or Time (based on HH:SS format)  
  Users can now see the time for the task, giving more detailed information for planning.  
- Add New Inputs for time (HH:ss), date, and priority  
  Users can set and edit the time for the task.  
- Editable Task  
  Users can now edit the task information freely, including the task name, date, time, or priority.  

**Changes:**  
- Date Format  
  The date format for the time is now (DD-MM-YYYY), changed from (YYYY-MM-DD), so users can read the date more easily than before.  
- Line mark  
  The line used to mark finished tasks on the to-do list is now deleted for better readability of tasks.

**v1.3.1**
**Changes**
- Optimize the code writation on *app/app.php*
- Add another header for the edit page, So now it won't be hard for user to differentiate the edit page from the home page. 