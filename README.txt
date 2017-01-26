# PHP Laravel Project: News Sharing Website
 User Management:
	1. New users can register
	2. Users can log in
	3. Users can log out
	4. Users have their own user pages with summary of their posts
	5. Registered users can choose their avatars
	6. Users can enter the website as guests
	7. Only registered users can post stories and edit/delete their own stories but not stories of other users
	8. Only registered users can post comments and edit/delete their own comments but not comments of other users
	9. All users can like stories
	10. Authors of stories can be searched by typing partial keyword
 Story and Comment Management:
	1. Use mysql as database for the website and Eloquent ORM to manage data
	2. Stories can be posted
	3. A link can be associated with each story, and they should be stored in a separate database field from the story
	4. Stories can be edited and deleted
	5. Stories can be liked and unliked
	6. Comments can be posted in association with a story
	7. Comments can be edited and deleted
 Best Practices:
	1. Code is well formatted and easy to read, with proper commenting
	2. Site follows the FIEO philosophy
	3. All pages pass the W3C validator
	4. CSRF tokens created using the Laravel.csrftoken object are passed when creating, editing, and deleting comments and stories (5 points)
