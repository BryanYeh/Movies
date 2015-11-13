SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE DATABASE IF NOT EXISTS movies DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE movies;

CREATE TABLE IF NOT EXISTS actor (
  id int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Actor ID',
  actor varchar(200) NOT NULL COMMENT 'Actor/Actress',
  actorseo varchar(200) NOT NULL COMMENT 'Actor/Actress SEO name',
  PRIMARY KEY (id),
  UNIQUE KEY actorseo (actorseo),
  UNIQUE KEY actor (actor),
  UNIQUE KEY id (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS genre (
  id int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Genre ID',
  genre varchar(200) NOT NULL COMMENT 'Genre',
  seogenre varchar(200) NOT NULL COMMENT 'Genre SEO name',
  PRIMARY KEY (id),
  UNIQUE KEY seogenre (seogenre),
  UNIQUE KEY genre (genre),
  UNIQUE KEY id (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='List of Genre' AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `language` (
  id int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Language ID',
  lang varchar(200) NOT NULL COMMENT 'Language',
  languageseo varchar(200) NOT NULL COMMENT 'Language SEO name',
  PRIMARY KEY (id),
  UNIQUE KEY id (id),
  UNIQUE KEY lang (lang),
  UNIQUE KEY languageseo (languageseo)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='List of Languages' AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS movie (
  id int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Movie ID',
  title varchar(300) NOT NULL COMMENT 'Movie Title',
  description text NOT NULL COMMENT 'Movie Description',
  seoname varchar(300) NOT NULL COMMENT 'Movie SEO term',
  PRIMARY KEY (id),
  UNIQUE KEY id (id),
  UNIQUE KEY seoname (seoname)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='List of Movies' AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS movie_actor (
  id int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  movie_id int(10) unsigned NOT NULL COMMENT 'Movie ID',
  actor_id int(10) unsigned NOT NULL COMMENT 'Actor ID',
  PRIMARY KEY (id),
  KEY movie_id (movie_id),
  KEY actor_id (actor_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Actors in the Movie' AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS movie_genre (
  id int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  movie_id int(10) unsigned NOT NULL COMMENT 'Movie ID',
  genre_id int(10) unsigned NOT NULL COMMENT 'Genre ID',
  PRIMARY KEY (id),
  KEY movie_id (movie_id),
  KEY genre_id (genre_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Movie''s Genre' AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS movie_languages (
  id int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  movie_id int(10) unsigned NOT NULL COMMENT 'Movie ID',
  language_id int(10) unsigned NOT NULL COMMENT 'Language ID',
  PRIMARY KEY (id),
  KEY movie_id (movie_id),
  KEY language_id (language_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Movie''s available languages' AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS movie_origin (
  id int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  movie_id int(10) unsigned NOT NULL COMMENT 'Movie ID',
  origin_id int(10) unsigned NOT NULL COMMENT 'Counry of Origin ID',
  PRIMARY KEY (id),
  KEY movie_id (movie_id),
  KEY origin_id (origin_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Movie''s Country of Origin' AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS movie_rating (
  id int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  movie_id int(10) unsigned NOT NULL COMMENT 'Movie ID',
  rating_id int(10) unsigned NOT NULL COMMENT 'Rating ID',
  PRIMARY KEY (id),
  KEY movie_id (movie_id),
  KEY rating_id (rating_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Movie''s rating' AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS movie_year (
  id int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  movie_id int(10) unsigned NOT NULL COMMENT 'Movie ID',
  year_id int(10) unsigned NOT NULL COMMENT 'Year ID',
  PRIMARY KEY (id),
  KEY movie_id (movie_id),
  KEY year_id (year_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Year of movie came out' AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS origin (
  id int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Origin ID',
  country varchar(200) NOT NULL COMMENT 'Country of Origin',
  countryseo varchar(200) NOT NULL COMMENT 'Country of Origin SEO',
  PRIMARY KEY (id),
  UNIQUE KEY id (id,country,countryseo),
  KEY id_2 (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Country of Origin List' AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS rating (
  id int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Ratings ID',
  rating varchar(5) NOT NULL COMMENT 'Rating',
  description varchar(500) NOT NULL COMMENT 'Rating Description',
  seorating varchar(5) NOT NULL COMMENT 'Rating SEO term',
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='List of Ratings' AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS yr (
  id int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Year ID',
  yr year(4) NOT NULL COMMENT 'Year',
  PRIMARY KEY (id),
  UNIQUE KEY id (id),
  UNIQUE KEY yr (yr)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='List of Years' AUTO_INCREMENT=1 ;


ALTER TABLE movie_actor
  ADD CONSTRAINT movie_actor_id2 FOREIGN KEY (actor_id) REFERENCES actor (id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT movie_actor_id1 FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE movie_genre
  ADD CONSTRAINT movie_genre_id2 FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT movie_genre_id1 FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE movie_languages
  ADD CONSTRAINT movie_languages_id2 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT movie_languages_id1 FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE movie_origin
  ADD CONSTRAINT movie_origin_id2 FOREIGN KEY (origin_id) REFERENCES origin (id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT movie_origin_id1 FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE movie_rating
  ADD CONSTRAINT movie_rating_id2 FOREIGN KEY (rating_id) REFERENCES rating (id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT movie_rating_id1 FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE movie_year
  ADD CONSTRAINT movie_year_id2 FOREIGN KEY (year_id) REFERENCES yr (id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT movie_year_id1 FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
