USE 2023_cs204_week4;

SELECT COUNT(*) FROM wp_posts;

SELECT post_author, COUNT(post_author) FROM wp_posts GROUP BY post_author;

SELECT user_nicename, post_title 
FROM wp_posts 
JOIN wp_users ON wp_users.id = wp_posts.post_author;

SELECT user_nicename, COUNT(post_title) 
FROM wp_posts JOIN wp_users ON wp_users.id = wp_posts.post_author 
GROUP BY user_nicename;


SELECT user_nicename, COUNT(post_title) 
FROM wp_posts JOIN wp_users ON wp_users.id = wp_posts.post_author 
GROUP BY user_nicename
ORDER BY COUNT(post_title) DESC;

SELECT user_nicename, COUNT(post_title) 
FROM wp_posts JOIN wp_users ON wp_users.id = wp_posts.post_author 
JOIN wp_comments ON wp_comments.comment_post_ID = wp_posts.ID
GROUP BY user_nicename
ORDER BY COUNT(post_title) DESC;