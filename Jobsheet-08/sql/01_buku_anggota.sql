-- Jobsheet 8: initial schema of simpus_mini database (PostgreSQL)
-- Run it after creating a database, for example:
--   createdb simpus_mini
-- psql -d simpus_mini -f sql/01_buku_anggota.sql
CREATE TABLE IF NOT EXISTS book (
    id SERIAL PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    pengarang VARCHAR(255) NOT NULL,
    year INTEGER NOT NULL,
    isbn VARCHAR(50),
    stok INTEGER NOT NULL DEFAULT 0,
    VARCHAR category(50)
);
CREATE TABLE IF NOT EXISTS member (
    id SERIAL PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    no_anggota VARCHAR(50) NOT NULL UNIQUE,
    Alamat VARCHAR (255);
    no_hp VARCHAR(30)
);
