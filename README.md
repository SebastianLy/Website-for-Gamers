# GRY-WIDEO

Członkowie grupy:

* **Sebastian Łyszkowski**,
* **Marek Bobrowski**.

## Krótki opis projektu:

Strona internetowa o grach wideo. Główną funkcją strony jest posiadanie bazy gier wideo. Każdy zalogowany użytownik może dodać grę do bazy, wypełniając formularz odpowiednimi informacjami: tytuł, gatunek, platforma, ocena i opcjonalnie recenzja. Tylko zalogowany użytkownik może dodawać i oceniać gry. Niezalogowani użytkownicy mogą przeglądać bazę gier oraz aktualności ze świata gier. Stroną tytułową jest strona zawierajaca 10 najlepiej ocenianych gier. Administrator dodaje newsy oraz może przeglądać bazę użytkowników. Może usunąć, zawiesić lub odwiesić konto użytkownika.

## Technologie:

* **HTML 5**
* **CSS 3**
* **PHP 7.4**
* **Symfony 5.0**

## Szczegółowy plan zadań:

### 1. Stworzenie bazy danych
Tabela z grami musi zawierać takie informacje jak:
* tytuł gry - string,
* gatunek - string,
* platforma - json,
* średnia ocena - decimal,
* liczba ocen - integer,
* suma ocen - integer,
* recenzja - text.

Tabela z użytkownikami będzie się składała z:
* nazwy użytkownika - string,
* adresu e-mail - string,
* hasła - string,
* uprawnień użytkownika - json,
* statusu konta - boolean.

Tabela z newsami o grach musi zawierać:
* tytuł newsa - string,
* autora newsa - string,
* date dodania - string,
* treść - text.


### 3. Stworzenie systemu rejestracji
1. Widok wyświetla html z formularzem rejestracji do wypełnienia: nazwa użytkownika, e-mail, hasło, powtórzone hasło.
2. Kontroler pobiera od użytkownika dane poprzez formularz, przesyła je do modelu.
3. Model analizuje pobrane informacje, sprawdza ich poprawność:
* e-mail oraz nazwa użytkownika nie są zajęte,
* e-mail jest w zapisany w odpowiedniej formie typu a@b.c,
* powtórzone hasło jest takie samo jak to pierwsze,
* w pola zostały wpisane tylko dozwolone znaki,
* ilość znaków w tych polach zawiera się w odpowiednich ramach.
4. Jeśli dane są poprawne, to nowy użytkownik zostaje dodany do bazy danych, w przeciwnym wypadku zwracany jest odpowiedni błąd. W zależności od wyniku model dyktuje, co ma wyświetlić widok (komunikat o sukcesie lub informacja, co należy poprawić w formularzu).

### 4. Stworzenie systemu logowania
1. Widok wyświetla HTML z formularzem do logowania, w którym należy wypełnić: nazwa użytkownika i hasło.
2. Kontroler pobiera od użytkownika dane z formularza oraz przesyła je do modelu.
3. Model analizuje pobrane informacje oraz sprawdza ich poprawność:
* czy w bazie danych znajduje się dana nazwa użytkownika,
* czy hasło pasuje do nazwy użytkownika.
4. Jeśli dane są poprawne użytkownik zostaje zalogowany do swojego konta. Jeśli nie, widok wyświetla komunikat o błędnych danych.

### 5. Stworzenie systemu dodawania gry do bazy danych
1. Widok wyświetla formularz HTML do dodania gry do bazy danych. Należy wypełnić ją: nazwą gry, jej gatunkiem (wybór w polu checkbox), wybrać platformy na jakie została wydana (wybór w polu checkbox), oceną (wybór między 1-5) i recenzją.
2. Kontroler pobiera od użytkownika te dane i przesyła do modelu.
3. Model analizuje dane i sprawdza ich poprawność:
* nie ma takiej nazwy w bazie,
* nazwa ma mniej niż 120 znaków,
* została wybrana co najmniej jedna platforma,
* recenzja ma mniej niż 500 znaków.
4. Jeśli dane są poprawne gra zostaje poprawnie dodana do bazy, w przeciwnym wypadku zwracany jest odpowiedni błąd. W zależności od wyniku model dyktuje, co ma wyświetlić widok (komunikat o sukcesie lub informacja, co należy poprawić w formularzu).

### 6. Stworzenie systemu oceny gry
1. Widok, gdy wyświetla grę, wyświetla też dla zalogowanych użytkowników przycisk do oceny gry danej gry w skali 1-5 oraz pole do napisania recenzji.
2. Kontroler przekazuje ocenę i recenzję do modelu.
3. Model zwiększa liczbę i sumę ocen, wylicza średnią i zmienia ją w bazie. Następnie zastępuje wcześniejszą recenzję nową.
4. Po wykonaniu swoich czynności model informuje widok poprzez kontroler o prawidłowym dokonaniu oceny gry.

### 7. Stworzenie systemu znajdowania gry po nazwie
1. Widok wyświetla pole tekstowe, w którym użytkownik wprowadza tytuł gry.
2. Kontroler pobiera dane i przesyła je do modelu.
3. Model przeszukuje bazę gier w poszukiwaniu gier zawierających dany ciąg znaków i przy pomocy kontrolera przesyła wszystkie gry zawierające ten ciąg znaków do widoku do wyświetlenia.
4. Jeśli model znalazł co najmniej jedną grę zawierającą ten dany ciag znaków, wtedy te gry zostają przesłane do widoku i wyświetlone w odpowiednim formacie. Jeśli nie to model przesyła informację o tym do widoku przy pomocy kontrolera i zostaje wyświetlona stosowna informacja.

### 8. Stworzenie podstrony TOP 10
1. Po wejściu na tę podstronę, model pyta bazę danych o 10 gier z najwyższą średnią.
2. Model nakazuje wyrenderować template html z tabelą wyświetlającą informacje o tych grach (w odpowiedniej kolejności).

### 9. Stworzenie podstrony z aktualnościami ze świata gier
Strona wyświetla newsy w kolejności od najnowszych. Wyświetla takie informacje jak: tytuł, autor, data dodania oraz treść. Newsy dodaje administrator.
