# GRY-WIDEO

Członkowie grupy:

* **Sebastian Łyszkowski**,
* **Marek Bobrowski**.

## Krótki opis projektu:

Strona internetowa o grach wideo. Główną funkcją będzie dodawanie do bazy danych gier komputerowych wraz z podstawowymi informacjami o nich: nazwa, gatunek, platforma, ocena, recenzja. Te informacje będą umieszczane w bazie danych.
W przypadku próby dodania istniejącej już w bazie danych gry, strona poinformuje o tym oraz zapyta czy użytkownik chce o ocenić tą grę.
Tylko zalogowani użytkownicy mają możliwość dodania oraz oceny gry. Goście mogą przeglądać gry oraz aktualności ze świata gier wideo.
Stworzona zostanie podstrona z rankingiem najwyżej ocenianych gier (TOP 30).
Użytkownik będzie mógł przeszukać bazę po nazwie w poszukiwaniu danej gry.

## Technologie:

* **HTML 5**
* **CSS 3**
* **PHP 7**
* **Symfony 5**

## Szczegółowy plan zadań:

### 1. Stworzenie bazy danych gier komputerowych
Baza musi zawierać takie informacje jak:
* tytuł gry,
* gatunek,
* platforma,
* średnia ocena,
* liczba ocen,
* recenzja 1,
* recenzja 2,
* recenzja 3.

### 2. Stworzenie bazy danych użytkowników
Baza będzie się składała z:
* nazw użytkowników,
* adresów e-mail,
* haseł.


### 3. Stworzenie systemu rejestracji
1. Widok wyświetla html z formularzem rejestracji do wypełnienia: nazwa użytkownika, e-mail, hasło, powtórzone hasło.
2. Kontroler pobiera od użytkownika dane poprzez formularz, przesyła je do modelu, do funkcji np. `validateSignUp(username, email, password1, password2)`.
3. Model analizuje pobrane informacje, sprawdza ich poprawność:
* e-mail oraz nazwa użytkownika nie są zajęte,
* e-mail jest w zapisany w odpowiedniej formie typu a@b.c,
* powtórzone hasło jest takie samo jak to pierwsze,
* w pola zostały wpisane tylko dozwolone znaki,
* ilość znaków w tych polach zawiera się w odpowiednich ramach.
4. Jeśli dane są poprawne, to nowy użytkownik zostaje dodany do bazy danych, w przeciwnym wypadku zwracany jest odpowiedni błąd. W zależności od wyniku model dyktuje, co ma wyświetlić widok (komunikat o sukcesie lub informacja, co należy poprawić w formularzu).

### 4. Stworzenie systemu logowania
1. Widok wyświetla HTML z formularzem do logowania, w którym należy wypełnić: nazwa użytkownika i hasło.
2. Kontroler pobiera od użytkownika dane z formularza oraz przesyła je do modelu. Do funkcji `validateSignIn(username, password)`.
3. Model analizuje pobrane informacje oraz sprawdza ich poprawność:
* czy w bazie danych znajduje się dana nazwa użytkownika,
* czy hasło pasuje do nazwy użytkownika.
4. Jeśli dane są poprawne użytkownik zostaje zalogowany do swojego konta. Jeśli nie, widok wyświetla komunikat o błędnych danych.

### 5. Stworzenie systemu dodawania gry do bazy danych
1. Widok wyświetla formularz HTML do dodania gry do bazy danych. Należy wypełnić ją: nazwą gry, jej gatunkiem (wybór w polu checkbox), wybrać platformy na jakie została wydana (wybór w polu checkbox), oceną (wybór między 1-10) i recenzją.
2. Kontroler pobiera od użytkownika te dane i przesyła do modelu. Do funkcji `addGame(name, type, platform, rating, review)`.
3. Model analizuje dane i sprawdza ich poprawność:
* nie ma takiej nazwy w bazie,
* nazwa ma mniej niż 120 znaków,
* zostały wybrane co najmniej jeden gatunek, ale nie więcej niż trzy,
* została wybrana co najmniej jedna platforma,
* recenzja ma mniej niż 500 znaków.
4. Jeśli dane są poprawne gra zostaje poprawnie dodana do bazy, w przeciwnym wypadku zwracany jest odpowiedni błąd. W zależności od wyniku model dyktuje, co ma wyświetlić widok (komunikat o sukcesie lub informacja, co należy poprawić w formularzu).

### 6. Stworzenie systemu oceny gry
1. Widok, gdy wyświetla grę, wyświetla też dla zalogowanych użytkowników opcję do oceny gry danej gry w skali 1-10 oraz pole do napisania recenzji.
2. Kontroler przekazuje ocenę i recenzję do modelu do funkcji `rateGame(rating, review)`.
3. Model zwiększa liczbę ocen, wylicza średnią i zmienia ją w bazie. Sprawdza czy bazie znajduje się wolne miejsce na recenzję, jeśli nie zastępuje najstarszą recenzję nową.
4. Po wykonaniu swoich czynności model informuje widok poprzez kontroler o prawidłowym dokonaniu oceny gry.

### 7. Stworzenie systemu znajdowania gry po nazwie
1. Widok wyświetla pole tekstowe, w którym użytkownik wprowadza tytuł gry.
2. Kontroler pobiera dane i przesyła je do modelu, do funkcji `findGame(title)`.
3. Model przeszukuje bazę gier w poszukiwaniu gier zawierających dany ciąg znaków i przy pomocy kontrolera przesyła wszystkie gry zawierające ten ciąg znaków do widoku do wyświetlenia.
4. Jeśli model znalazł conajmniej jedną grę zawierającą ten dany ciag znaków, wtedy te gry zostają przesłane do widoku i wyświetlone w odpowiednim formacie. Jeśli nie to model przesyła informację o tym do widoku przy pomocy kontrolera i zostaje wyświetlona stosowna informacja.

### 8. Stworzenie podstrony TOP 30
1. Po wejściu na tę podstronę, model pyta bazę danych o 10 gier z najwyższą średnią za pomocą funkcji `getTop30()`.
2. Model nakazuje wyrenderować template html z tabelą wyświetlającą informacje o tych grach (w odpowiedniej kolejności).

### 9. Stworzenie podstrony z aktualnościami ze świata gier
Sytuacja podobna jak dla TOP30, tylko że bedą pobierane posty w kolejności od najnowszych do najstarszych i wyświetlane za pomocą template html.
