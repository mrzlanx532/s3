ALTER USER postgres PASSWORD 'postgres';

DROP DATABASE IF EXISTS s3;

CREATE DATABASE s3;

\c s3;

DROP SCHEMA public;

CREATE SCHEMA public;

SET search_path TO public;

ALTER SCHEMA public OWNER TO postgres;

SET default_tablespace = '';
SET default_table_access_method = heap;
