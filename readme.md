…or create a new repository on the command line

echo "# dashboard" >> README.md
git init
git add README.md
git commit -m "first commit"
git remote add origin https://github.com/snemesh/dashboard.git
git push -u origin master
…or push an existing repository from the command line

git remote add origin https://github.com/snemesh/dashboard.git
git push -u origin master
…or import code from another repository
You can initialize this repository with code from a Subversion, Mercurial, or TFS project.


export PATH=$PATH:/usr/local/var/www/htdocs/Board/vendor/propel/propel/bin/

-----
Build schema
$ propel sql:build
$ propel model:build
$ propel config:convert
$ propel sql:insert

UPDATE `myemployee` SET data='201611' WHERE id != 0;

INSERT INTO `myemployee` (`speciality`, `employee`, `level`, `data`, `datemonth`, `dateyear`, `salary`, `hourlyrate`, `group`, `spented`)
VALUES
	(NULL, 'Aleksey Mitiev', NULL, '', NULL, NULL, NULL, NULL, NULL, 25),
	(NULL, 'Alexandr Borshchenko', NULL, '', NULL, NULL, NULL, NULL, NULL, 94.66),
	(NULL, 'Alexandr Bukhonenko', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 37.5),
	(NULL, 'Alexandr Sviderskiy', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 2),
	(NULL, 'Alexandr Tselkovsky', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 8),
	(NULL, 'Alexandra Tsyrkun', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 130),
	(NULL, 'Andrew Horuzhii', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 21),
	(NULL, 'Andrey Forkalyuk', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 2),
	(NULL, 'Andrey Kalinin', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 38),
	(NULL, 'Andrey Obertas', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 24),
	(NULL, 'Anton Shyltsev', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 5.12),
	(NULL, 'Artur Mkrtychian', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 21.5),
	(NULL, 'Bogdan Kozhushko', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 1),
	(NULL, 'Dima Guliaiev', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 102),
	(NULL, 'Dmitriy Saviuk', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 116),
	(NULL, 'George Alekhnovitch', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 795),
	(NULL, 'Igor Kravchenko', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 142),
	(NULL, 'Igor Rolinskiy', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 303.44),
	(NULL, 'Ivan Prikhodko', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 21),
	(NULL, 'Juliya Matveeva', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 192),
	(NULL, 'Konstantin Sydiak', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 80),
	(NULL, 'Maksim	Serzhenjuk', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 40),
	(NULL, 'Maksym Ugrekhelidze', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 1.42),
	(NULL, 'Nikolay Vlakh', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 118.5),
	(NULL, 'Oksana Ilchyshyn', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 194.91),
	(NULL, 'Oleg Kuzenko', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 261),
	(NULL, 'Oleg Timoshenko', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 263.5),
	(NULL, 'Oleksiy Vus', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 40),
	(NULL, 'Paul Ozolin', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 42),
	(NULL, 'Pavel Youtish', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 14.02),
	(NULL, 'Polina Karpenko', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 672.02),
	(NULL, 'Roman Gagarin', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 0.5),
	(NULL, 'Sergey Nemesh', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 71),
	(NULL, 'Sergey Shcherbakov', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 131),
	(NULL, 'Stanislav Reznichenko', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 125.5),
	(NULL, 'Valentin Munitsa', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 1),
	(NULL, 'Yaroslav Rotar', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 4),
	(NULL, 'Yuriy  Peslyak', NULL, '201611', NULL, NULL, NULL, NULL, NULL, 54);
	
	…or create a new repository on the command line
    
    echo "# board1" >> README.md
    git init
    git add README.md
    git commit -m "first commit"
    git remote add origin git@github.com:snemesh/board1.git
    git push -u origin master
    …or push an existing repository from the command line
    
    git remote add origin git@github.com:snemesh/board1.git
    git push -u origin master
    …or import code from another repository
    You can initialize this repository with code from a Subversion, Mercurial, or TFS project.