This is my first project

#Memorize Scripture: Is meant to be a project to enable memorization with the method called "Extended Memorization".

##TODO:

###5. Current task:

    - now we are integrating adminbundle we are trying to read rst files 1
    - a lot of time has elapsed
	- now trying to get the twig template to display sample SessionVerses entries
	- just tested phpstorm for 30 days started today 1 April
	- fixed template for Tracker controller
	- we will leave association from verse to chapter to book to bible for later
	- fixed associations missing @orm for entities SessionVerse and Verse
	- fixed my git setup because of sparkleshare
	- did some modifications to the model
	- changing name from old "Recitee" to SessionVerse	
	- working on dql query on SessionVerseRepository.php - there has to be relationships
	- have created entity for SessionVerse
	- added routing to local configuration
	- have added Tracker Controller file
	- have added Tracker Controller test file



###4. Transforming the specification of use into an specification for the platform

	Here is spec of use:

		1. write a verse you intend to memorize on the first line of the "week" page
		2. memorize it and recite it, and check box closest in line to it
		3. 6 boxes per week, recite and check, each box is a day, R is for rest
		4. recite 6 days a week for 6 weeks (36 times)
			The most you can be memorizing at one time is six verses on any given week
		5. extending it review 1 time a week 6 months (4 weeks each month) 24 weeks
		   each day at maximum could be 4 verses because at the end of the 24th week we will have at most
		   24 verses 1 coming in each week, so a total of 24 verses to repeat on a given week, if we
		   split 4 verses each day across the 6 days on that week then it is easier. Notice that
		   this 4 verses is on top of the 6 verses that we could be reciting a day.

		   Therefore, in total on any given day at maximum one can be reciting 6 + 4 = 10 verses
		   And learning 1 new verse every week for good and sustained increase.
		   In a year there are 52 weeks, which means we can learn 52 new verses every year.
		   If a person invests approximately 40 years on memorization then that person will know
		   how to recite by memory 52 x 40 = 2080 verses for a lifetime.
		   Genesis has 50 chapters and the number of total verses in the book is less than 1600.

		   The number of verses to memorize a day can be increased as a parameter but ideal is 10 a day as above.
		   This is signaled with the elipses in the specs below.

	Here is our spec:

		1. presentation or views proposed
			
			Single Verse View
				SessionVerse -verse text (e.g. In the beginning was the Word ....)
					-date entered
					-number of recitations
					-number of extended recitations
					-active in day view
					-active in week view
					-active in month (or many weeks) view
					-did you recite it yet? yes or no

			Day View (ideal total of 10 using the advised params)

						Day # date dd/mm/yyyy

				Verses			e.g.	
					verse position 1    	John 20:1
					verse position 2	John 20:2
					verse position 3	John 20:3
					verse position 4	John 20:4
					verse position 5	John 20:5
					verse position 6	John 20:6
					...

				Extended verses
					verse position 1	John 19:3
					verse position 2	John 19:4
					verse position 3	John 19:5
					verse position 4	John 19:6
					...

			Week or Many Weeks View
				week 1 week 2 week 3 week 4 week 5...
					
				Week 2					Week 2
					daily  () = today			daily  () = today

					Mon Tue Wed (Thu) Fri Sat		Mon Tue Wed (Thu) Fri Sat
					11  12  13  (14)  15  16		11  12  13  (14)  15  16
					21  22  23  (24)  25  26		21  22  23  (24)  25  26
					31  32  33  (34)  35  36		31  32  33  (34)  35  36
					41  42  43  (44)  45  46		41  42  43  (44)  45  46
					51  52  53  (54)  55  56		51  52  53  (54)  55  56
					61  62  63  (64)  65  66		61  62  63  (64)  65  66
					...					...
						extended				extended
					11  12  13  (14)  15  16		11  12  13  (14)  15  16
					21  22  23  (24)  25  26		21  22  23  (24)  25  26
					31  32  33  (34)  35  36		31  32  33  (34)  35  36
					41  42  43  (44)  45  46		41  42  43  (44)  45  46	
					...					...

			
			Logs View

				Display queue of verses already memorized

			Create New SessionVerse

				Select verse: Pull down for Bible, Book, Chapter, Verse

				Schedule date of entrance: dd/mm/yyyy

				Param (how extended?): # of total repetitions
				
			Create SessionVerse Range

				Select verse range: Pull down for Bible, Book, Chapter, Start Verse, End Verse

				Schedule date of entrance: dd/mm/yyyy

				Param (how extended?): # of total repetitions

###3. we thought about going to gitorious however we decided to pull back into github as we should be ok in memory

###2. work on FixtureLoader to load KJV Bible data into database with app/console doctrine:load:data
   - now adapting scrapper into FixtureLoader so we can load at least a chapter of the KJV Bible
   	- have created fixture entry points for bible, book, chapter, and verse
        - have reloaded data into entity tables successfully with app/console doctrine:data:load
	- have integrated scrapper
        - have expanded verse entity to include the text of each verse
	- have successfully loaded all Genesis, however verses are spread out in a single table

###1. create database elements to input the scrap data that we got from KJV
   - have created entities for each of the bible, chapter, verse elements
   - have cleared cache with app/console cache:clear
   - have drop earlier tables with app/console doctrine:schema:drop --force
   - have recrated entity tables / schema with app/console doctrine:schema:create
   - have reloaded data into entity tables with app/console doctrine:data:load

	
##Credits:

JMather
cordoval_

##Credits of method for memorization:

Thomas J. Frost and Erpus the Wonder Dog Inc.

