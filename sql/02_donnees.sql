-- =============================================================
--  Présidents des États-Unis – Données (1789 à aujourd'hui)
--  Exécuter après 01_schema.sql
--  Données historiques publiques (dates vérifiables sur Wikipédia ou sur whitehouse.gov) :
--  naissance, décès, entrée et sortie de fonction.
--  État d'origine = État de naissance.
-- =============================================================

-- ---------- DIRIGEANT : les 45 présidents, puis les vice-présidents qui ne sont jamais devenus présidents
INSERT INTO DIRIGEANT (id_dirigeant, nom, prenom, date_naissance, date_deces, parti, etat_origine) VALUES
  (1, 'Washington', 'George', '1732-02-22', '1799-12-14', 'Sans parti', 'Virginie'),
  (2, 'Adams', 'John', '1735-10-30', '1826-07-04', 'Fédéraliste', 'Massachusetts'),
  (3, 'Jefferson', 'Thomas', '1743-04-13', '1826-07-04', 'Démocrate-républicain', 'Virginie'),
  (4, 'Madison', 'James', '1751-03-16', '1836-06-28', 'Démocrate-républicain', 'Virginie'),
  (5, 'Monroe', 'James', '1758-04-28', '1831-07-04', 'Démocrate-républicain', 'Virginie'),
  (6, 'Adams', 'John Quincy', '1767-07-11', '1848-02-23', 'Démocrate-républicain', 'Massachusetts'),
  (7, 'Jackson', 'Andrew', '1767-03-15', '1845-06-08', 'Démocrate', 'Caroline du Sud'),
  (8, 'Van Buren', 'Martin', '1782-12-05', '1862-07-24', 'Démocrate', 'New York'),
  (9, 'Harrison', 'William Henry', '1773-02-09', '1841-04-04', 'Whig', 'Virginie'),
  (10, 'Tyler', 'John', '1790-03-29', '1862-01-18', 'Whig', 'Virginie'),
  (11, 'Polk', 'James K.', '1795-11-02', '1849-06-15', 'Démocrate', 'Caroline du Nord'),
  (12, 'Taylor', 'Zachary', '1784-11-24', '1850-07-09', 'Whig', 'Virginie'),
  (13, 'Fillmore', 'Millard', '1800-01-07', '1874-03-08', 'Whig', 'New York'),
  (14, 'Pierce', 'Franklin', '1804-11-23', '1869-10-08', 'Démocrate', 'New Hampshire'),
  (15, 'Buchanan', 'James', '1791-04-23', '1868-06-01', 'Démocrate', 'Pennsylvanie'),
  (16, 'Lincoln', 'Abraham', '1809-02-12', '1865-04-15', 'Républicain', 'Kentucky'),
  (17, 'Johnson', 'Andrew', '1808-12-29', '1875-07-31', 'Union nationale', 'Caroline du Nord'),
  (18, 'Grant', 'Ulysses S.', '1822-04-27', '1885-07-23', 'Républicain', 'Ohio'),
  (19, 'Hayes', 'Rutherford B.', '1822-10-04', '1893-01-17', 'Républicain', 'Ohio'),
  (20, 'Garfield', 'James A.', '1831-11-19', '1881-09-19', 'Républicain', 'Ohio'),
  (21, 'Arthur', 'Chester A.', '1829-10-05', '1886-11-18', 'Républicain', 'Vermont'),
  (22, 'Cleveland', 'Grover', '1837-03-18', '1908-06-24', 'Démocrate', 'New Jersey'),
  (23, 'Harrison', 'Benjamin', '1833-08-20', '1901-03-13', 'Républicain', 'Ohio'),
  (24, 'McKinley', 'William', '1843-01-29', '1901-09-14', 'Républicain', 'Ohio'),
  (25, 'Roosevelt', 'Theodore', '1858-10-27', '1919-01-06', 'Républicain', 'New York'),
  (26, 'Taft', 'William Howard', '1857-09-15', '1930-03-08', 'Républicain', 'Ohio'),
  (27, 'Wilson', 'Woodrow', '1856-12-28', '1924-02-03', 'Démocrate', 'Virginie'),
  (28, 'Harding', 'Warren G.', '1865-11-02', '1923-08-02', 'Républicain', 'Ohio'),
  (29, 'Coolidge', 'Calvin', '1872-07-04', '1933-01-05', 'Républicain', 'Vermont'),
  (30, 'Hoover', 'Herbert', '1874-08-10', '1964-10-20', 'Républicain', 'Iowa'),
  (31, 'Roosevelt', 'Franklin D.', '1882-01-30', '1945-04-12', 'Démocrate', 'New York'),
  (32, 'Truman', 'Harry S.', '1884-05-08', '1972-12-26', 'Démocrate', 'Missouri'),
  (33, 'Eisenhower', 'Dwight D.', '1890-10-14', '1969-03-28', 'Républicain', 'Texas'),
  (34, 'Kennedy', 'John F.', '1917-05-29', '1963-11-22', 'Démocrate', 'Massachusetts'),
  (35, 'Johnson', 'Lyndon B.', '1908-08-27', '1973-01-22', 'Démocrate', 'Texas'),
  (36, 'Nixon', 'Richard', '1913-01-09', '1994-04-22', 'Républicain', 'Californie'),
  (37, 'Ford', 'Gerald', '1913-07-14', '2006-12-26', 'Républicain', 'Nebraska'),
  (38, 'Carter', 'Jimmy', '1924-10-01', '2024-12-29', 'Démocrate', 'Géorgie'),
  (39, 'Reagan', 'Ronald', '1911-02-06', '2004-06-05', 'Républicain', 'Illinois'),
  (40, 'Bush', 'George H. W.', '1924-06-12', '2018-11-30', 'Républicain', 'Massachusetts'),
  (41, 'Clinton', 'Bill', '1946-08-19', NULL, 'Démocrate', 'Arkansas'),
  (42, 'Bush', 'George W.', '1946-07-06', NULL, 'Républicain', 'Connecticut'),
  (43, 'Obama', 'Barack', '1961-08-04', NULL, 'Démocrate', 'Hawaï'),
  (44, 'Trump', 'Donald', '1946-06-14', NULL, 'Républicain', 'New York'),
  (45, 'Biden', 'Joe', '1942-11-20', NULL, 'Démocrate', 'Pennsylvanie'),
  (46, 'Burr', 'Aaron', '1756-02-06', '1836-09-14', 'Démocrate-républicain', 'New Jersey'),
  (47, 'Clinton', 'George', '1739-07-26', '1812-04-20', 'Démocrate-républicain', 'New York'),
  (48, 'Gerry', 'Elbridge', '1744-07-17', '1814-11-23', 'Démocrate-républicain', 'Massachusetts'),
  (49, 'Tompkins', 'Daniel D.', '1774-06-21', '1825-06-11', 'Démocrate-républicain', 'New York'),
  (50, 'Calhoun', 'John C.', '1782-03-18', '1850-03-31', 'Démocrate', 'Caroline du Sud'),
  (51, 'Johnson', 'Richard Mentor', '1780-10-17', '1850-11-19', 'Démocrate', 'Kentucky'),
  (52, 'Dallas', 'George M.', '1792-07-10', '1864-12-31', 'Démocrate', 'Pennsylvanie'),
  (53, 'King', 'William R.', '1786-04-07', '1853-04-18', 'Démocrate', 'Caroline du Nord'),
  (54, 'Breckinridge', 'John C.', '1821-01-16', '1875-05-17', 'Démocrate', 'Kentucky'),
  (55, 'Hamlin', 'Hannibal', '1809-08-27', '1891-07-04', 'Républicain', 'Maine'),
  (56, 'Colfax', 'Schuyler', '1823-03-23', '1885-01-13', 'Républicain', 'New York'),
  (57, 'Wilson', 'Henry', '1812-02-16', '1875-11-22', 'Républicain', 'New Hampshire'),
  (58, 'Wheeler', 'William A.', '1819-06-30', '1887-06-04', 'Républicain', 'New York'),
  (59, 'Hendricks', 'Thomas A.', '1819-09-07', '1885-11-25', 'Démocrate', 'Ohio'),
  (60, 'Morton', 'Levi P.', '1824-05-16', '1920-05-16', 'Républicain', 'Vermont'),
  (61, 'Stevenson', 'Adlai E.', '1835-10-23', '1914-06-14', 'Démocrate', 'Kentucky'),
  (62, 'Hobart', 'Garret', '1844-06-03', '1899-11-21', 'Républicain', 'New Jersey'),
  (63, 'Fairbanks', 'Charles W.', '1852-05-11', '1918-06-04', 'Républicain', 'Ohio'),
  (64, 'Sherman', 'James S.', '1855-10-24', '1912-10-30', 'Républicain', 'New York'),
  (65, 'Marshall', 'Thomas R.', '1854-03-14', '1925-06-01', 'Démocrate', 'Indiana'),
  (66, 'Dawes', 'Charles G.', '1865-08-27', '1951-04-23', 'Républicain', 'Ohio'),
  (67, 'Curtis', 'Charles', '1860-01-25', '1936-02-08', 'Républicain', 'Kansas'),
  (68, 'Garner', 'John Nance', '1868-11-22', '1967-11-07', 'Démocrate', 'Texas'),
  (69, 'Wallace', 'Henry A.', '1888-10-07', '1965-11-18', 'Démocrate', 'Iowa'),
  (70, 'Barkley', 'Alben W.', '1877-11-24', '1956-04-30', 'Démocrate', 'Kentucky'),
  (71, 'Humphrey', 'Hubert', '1911-05-27', '1978-01-13', 'Démocrate', 'Dakota du Sud'),
  (72, 'Agnew', 'Spiro', '1918-11-09', '1996-09-17', 'Républicain', 'Maryland'),
  (73, 'Rockefeller', 'Nelson', '1908-07-08', '1979-01-26', 'Républicain', 'Maine'),
  (74, 'Mondale', 'Walter', '1928-01-05', '2021-04-19', 'Démocrate', 'Minnesota'),
  (75, 'Quayle', 'Dan', '1947-02-04', NULL, 'Républicain', 'Indiana'),
  (76, 'Gore', 'Al', '1948-03-31', NULL, 'Démocrate', 'District de Columbia'),
  (77, 'Cheney', 'Dick', '1941-01-30', '2025-11-03', 'Républicain', 'Nebraska'),
  (78, 'Pence', 'Mike', '1959-06-07', NULL, 'Républicain', 'Indiana'),
  (79, 'Harris', 'Kamala', '1964-10-20', NULL, 'Démocrate', 'Californie'),
  (80, 'Vance', 'JD', '1984-08-02', NULL, 'Républicain', 'Ohio');

-- ---------- MANDAT : un président par ligne ; un mandat électoral interrompu (décès, démission)
--            est partagé entre deux présidents qui ont le même numero_mandat
INSERT INTO MANDAT (id_mandat, numero_mandat, date_debut, date_fin, id_dirigeant) VALUES
  (1, 1, '1789-04-30', '1793-03-04', 1),   -- George Washington
  (2, 2, '1793-03-04', '1797-03-04', 1),   -- George Washington
  (3, 3, '1797-03-04', '1801-03-04', 2),   -- John Adams
  (4, 4, '1801-03-04', '1805-03-04', 3),   -- Thomas Jefferson
  (5, 5, '1805-03-04', '1809-03-04', 3),   -- Thomas Jefferson
  (6, 6, '1809-03-04', '1813-03-04', 4),   -- James Madison
  (7, 7, '1813-03-04', '1817-03-04', 4),   -- James Madison
  (8, 8, '1817-03-04', '1821-03-04', 5),   -- James Monroe
  (9, 9, '1821-03-04', '1825-03-04', 5),   -- James Monroe
  (10, 10, '1825-03-04', '1829-03-04', 6),   -- John Quincy Adams
  (11, 11, '1829-03-04', '1833-03-04', 7),   -- Andrew Jackson
  (12, 12, '1833-03-04', '1837-03-04', 7),   -- Andrew Jackson
  (13, 13, '1837-03-04', '1841-03-04', 8),   -- Martin Van Buren
  (14, 14, '1841-03-04', '1841-04-04', 9),   -- William Henry Harrison
  (15, 14, '1841-04-04', '1845-03-04', 10),   -- John Tyler
  (16, 15, '1845-03-04', '1849-03-04', 11),   -- James K. Polk
  (17, 16, '1849-03-04', '1850-07-09', 12),   -- Zachary Taylor
  (18, 16, '1850-07-09', '1853-03-04', 13),   -- Millard Fillmore
  (19, 17, '1853-03-04', '1857-03-04', 14),   -- Franklin Pierce
  (20, 18, '1857-03-04', '1861-03-04', 15),   -- James Buchanan
  (21, 19, '1861-03-04', '1865-03-04', 16),   -- Abraham Lincoln
  (22, 20, '1865-03-04', '1865-04-15', 16),   -- Abraham Lincoln
  (23, 20, '1865-04-15', '1869-03-04', 17),   -- Andrew Johnson
  (24, 21, '1869-03-04', '1873-03-04', 18),   -- Ulysses S. Grant
  (25, 22, '1873-03-04', '1877-03-04', 18),   -- Ulysses S. Grant
  (26, 23, '1877-03-04', '1881-03-04', 19),   -- Rutherford B. Hayes
  (27, 24, '1881-03-04', '1881-09-19', 20),   -- James A. Garfield
  (28, 24, '1881-09-19', '1885-03-04', 21),   -- Chester A. Arthur
  (29, 25, '1885-03-04', '1889-03-04', 22),   -- Grover Cleveland
  (30, 26, '1889-03-04', '1893-03-04', 23),   -- Benjamin Harrison
  (31, 27, '1893-03-04', '1897-03-04', 22),   -- Grover Cleveland
  (32, 28, '1897-03-04', '1901-03-04', 24),   -- William McKinley
  (33, 29, '1901-03-04', '1901-09-14', 24),   -- William McKinley
  (34, 29, '1901-09-14', '1905-03-04', 25),   -- Theodore Roosevelt
  (35, 30, '1905-03-04', '1909-03-04', 25),   -- Theodore Roosevelt
  (36, 31, '1909-03-04', '1913-03-04', 26),   -- William Howard Taft
  (37, 32, '1913-03-04', '1917-03-04', 27),   -- Woodrow Wilson
  (38, 33, '1917-03-04', '1921-03-04', 27),   -- Woodrow Wilson
  (39, 34, '1921-03-04', '1923-08-02', 28),   -- Warren G. Harding
  (40, 34, '1923-08-02', '1925-03-04', 29),   -- Calvin Coolidge
  (41, 35, '1925-03-04', '1929-03-04', 29),   -- Calvin Coolidge
  (42, 36, '1929-03-04', '1933-03-04', 30),   -- Herbert Hoover
  (43, 37, '1933-03-04', '1937-01-20', 31),   -- Franklin D. Roosevelt
  (44, 38, '1937-01-20', '1941-01-20', 31),   -- Franklin D. Roosevelt
  (45, 39, '1941-01-20', '1945-01-20', 31),   -- Franklin D. Roosevelt
  (46, 40, '1945-01-20', '1945-04-12', 31),   -- Franklin D. Roosevelt
  (47, 40, '1945-04-12', '1949-01-20', 32),   -- Harry S. Truman
  (48, 41, '1949-01-20', '1953-01-20', 32),   -- Harry S. Truman
  (49, 42, '1953-01-20', '1957-01-20', 33),   -- Dwight D. Eisenhower
  (50, 43, '1957-01-20', '1961-01-20', 33),   -- Dwight D. Eisenhower
  (51, 44, '1961-01-20', '1963-11-22', 34),   -- John F. Kennedy
  (52, 44, '1963-11-22', '1965-01-20', 35),   -- Lyndon B. Johnson
  (53, 45, '1965-01-20', '1969-01-20', 35),   -- Lyndon B. Johnson
  (54, 46, '1969-01-20', '1973-01-20', 36),   -- Richard Nixon
  (55, 47, '1973-01-20', '1974-08-09', 36),   -- Richard Nixon
  (56, 47, '1974-08-09', '1977-01-20', 37),   -- Gerald Ford
  (57, 48, '1977-01-20', '1981-01-20', 38),   -- Jimmy Carter
  (58, 49, '1981-01-20', '1985-01-20', 39),   -- Ronald Reagan
  (59, 50, '1985-01-20', '1989-01-20', 39),   -- Ronald Reagan
  (60, 51, '1989-01-20', '1993-01-20', 40),   -- George H. W. Bush
  (61, 52, '1993-01-20', '1997-01-20', 41),   -- Bill Clinton
  (62, 53, '1997-01-20', '2001-01-20', 41),   -- Bill Clinton
  (63, 54, '2001-01-20', '2005-01-20', 42),   -- George W. Bush
  (64, 55, '2005-01-20', '2009-01-20', 42),   -- George W. Bush
  (65, 56, '2009-01-20', '2013-01-20', 43),   -- Barack Obama
  (66, 57, '2013-01-20', '2017-01-20', 43),   -- Barack Obama
  (67, 58, '2017-01-20', '2021-01-20', 44),   -- Donald Trump
  (68, 59, '2021-01-20', '2025-01-20', 45),   -- Joe Biden
  (69, 60, '2025-01-20', '2029-01-20', 44);   -- Donald Trump

-- ---------- ASSISTE : vice-présidents de chaque mandat
INSERT INTO ASSISTE (id_assiste, id_mandat, id_dirigeant, date_debut_vp, date_fin_vp, motif_fin) VALUES
  (1, 1, 2, '1789-04-21', '1793-03-04', 'Fin normale'),
  (2, 2, 2, '1793-03-04', '1797-03-04', 'Fin normale'),
  (3, 3, 3, '1797-03-04', '1801-03-04', 'Fin normale'),
  (4, 4, 46, '1801-03-04', '1805-03-04', 'Fin normale'),
  (5, 5, 47, '1805-03-04', '1809-03-04', 'Fin normale'),
  (6, 6, 47, '1809-03-04', '1812-04-20', 'Deces'),
  (7, 7, 48, '1813-03-04', '1814-11-23', 'Deces'),
  (8, 8, 49, '1817-03-04', '1821-03-04', 'Fin normale'),
  (9, 9, 49, '1821-03-04', '1825-03-04', 'Fin normale'),
  (10, 10, 50, '1825-03-04', '1829-03-04', 'Fin normale'),
  (11, 11, 50, '1829-03-04', '1832-12-28', 'Demission'),
  (12, 12, 8, '1833-03-04', '1837-03-04', 'Fin normale'),
  (13, 13, 51, '1837-03-04', '1841-03-04', 'Fin normale'),
  (14, 14, 10, '1841-03-04', '1841-04-04', 'Succession'),
  (15, 16, 52, '1845-03-04', '1849-03-04', 'Fin normale'),
  (16, 17, 13, '1849-03-04', '1850-07-09', 'Succession'),
  (17, 19, 53, '1853-03-24', '1853-04-18', 'Deces'),
  (18, 20, 54, '1857-03-04', '1861-03-04', 'Fin normale'),
  (19, 21, 55, '1861-03-04', '1865-03-04', 'Fin normale'),
  (20, 22, 17, '1865-03-04', '1865-04-15', 'Succession'),
  (21, 24, 56, '1869-03-04', '1873-03-04', 'Fin normale'),
  (22, 25, 57, '1873-03-04', '1875-11-22', 'Deces'),
  (23, 26, 58, '1877-03-04', '1881-03-04', 'Fin normale'),
  (24, 27, 21, '1881-03-04', '1881-09-19', 'Succession'),
  (25, 29, 59, '1885-03-04', '1885-11-25', 'Deces'),
  (26, 30, 60, '1889-03-04', '1893-03-04', 'Fin normale'),
  (27, 31, 61, '1893-03-04', '1897-03-04', 'Fin normale'),
  (28, 32, 62, '1897-03-04', '1899-11-21', 'Deces'),
  (29, 33, 25, '1901-03-04', '1901-09-14', 'Succession'),
  (30, 35, 63, '1905-03-04', '1909-03-04', 'Fin normale'),
  (31, 36, 64, '1909-03-04', '1912-10-30', 'Deces'),
  (32, 37, 65, '1913-03-04', '1917-03-04', 'Fin normale'),
  (33, 38, 65, '1917-03-04', '1921-03-04', 'Fin normale'),
  (34, 39, 29, '1921-03-04', '1923-08-02', 'Succession'),
  (35, 41, 66, '1925-03-04', '1929-03-04', 'Fin normale'),
  (36, 42, 67, '1929-03-04', '1933-03-04', 'Fin normale'),
  (37, 43, 68, '1933-03-04', '1937-01-20', 'Fin normale'),
  (38, 44, 68, '1937-01-20', '1941-01-20', 'Fin normale'),
  (39, 45, 69, '1941-01-20', '1945-01-20', 'Fin normale'),
  (40, 46, 32, '1945-01-20', '1945-04-12', 'Succession'),
  (41, 48, 70, '1949-01-20', '1953-01-20', 'Fin normale'),
  (42, 49, 36, '1953-01-20', '1957-01-20', 'Fin normale'),
  (43, 50, 36, '1957-01-20', '1961-01-20', 'Fin normale'),
  (44, 51, 35, '1961-01-20', '1963-11-22', 'Succession'),
  (45, 53, 71, '1965-01-20', '1969-01-20', 'Fin normale'),
  (46, 54, 72, '1969-01-20', '1973-01-20', 'Fin normale'),
  (47, 55, 72, '1973-01-20', '1973-10-10', 'Demission'),
  (48, 55, 37, '1973-12-06', '1974-08-09', 'Succession'),
  (49, 56, 73, '1974-12-19', '1977-01-20', 'Fin normale'),
  (50, 57, 74, '1977-01-20', '1981-01-20', 'Fin normale'),
  (51, 58, 40, '1981-01-20', '1985-01-20', 'Fin normale'),
  (52, 59, 40, '1985-01-20', '1989-01-20', 'Fin normale'),
  (53, 60, 75, '1989-01-20', '1993-01-20', 'Fin normale'),
  (54, 61, 76, '1993-01-20', '1997-01-20', 'Fin normale'),
  (55, 62, 76, '1997-01-20', '2001-01-20', 'Fin normale'),
  (56, 63, 77, '2001-01-20', '2005-01-20', 'Fin normale'),
  (57, 64, 77, '2005-01-20', '2009-01-20', 'Fin normale'),
  (58, 65, 45, '2009-01-20', '2013-01-20', 'Fin normale'),
  (59, 66, 45, '2013-01-20', '2017-01-20', 'Fin normale'),
  (60, 67, 78, '2017-01-20', '2021-01-20', 'Fin normale'),
  (61, 68, 79, '2021-01-20', '2025-01-20', 'Fin normale'),
  (62, 69, 80, '2025-01-20', '2029-01-20', 'En cours');

-- Les identifiants ont été fixés : on recale les séquences pour les prochaines insertions du site
SELECT setval(pg_get_serial_sequence('dirigeant', 'id_dirigeant'), (SELECT MAX(id_dirigeant) FROM DIRIGEANT));
SELECT setval(pg_get_serial_sequence('mandat', 'id_mandat'), (SELECT MAX(id_mandat) FROM MANDAT));
SELECT setval(pg_get_serial_sequence('assiste', 'id_assiste'), (SELECT MAX(id_assiste) FROM ASSISTE));
