install:
	composer install

brain-games:
	./bin/brain-games.php

brain-even:
	./bin/brain-even.php

brain-calc:
	./bin/brain-calc.php

brain-gcd:
	./bin/brain-gcd.php

validate:
	composer validate
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin