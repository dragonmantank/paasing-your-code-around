run "cd #{release_path} && /usr/bin/php bin/ruckus.php db:setup"
run "cd #{release_path} && /usr/bin/php bin/ruckus.php db:migrate"