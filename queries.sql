1) SELECT c.credits_count as credits_count, u.email from credits c JOIN users U ON(u.id = c.user_id) WHERE user_id >= 0
2)INSERT INTO credits (credits_count, user_id) VALUES(10, 1)