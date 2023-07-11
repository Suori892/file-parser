
# XML and JSON File Manipulation

## task 1
This program takes an XML file as input, which contains <person> tags with attributes name and surname. The program creates a copy of the input file where the value of the surname attribute is concatenated with the name attribute. The surname attribute is then removed. 

## task 2
This program processes a collection of text files, each representing a "snapshot" of a traffic rule violation database for a specific year. Each file contains a list of JSON or XML objects representing violations. The program reads data from all the files, calculates and outputs violation statistics to a file. The output file contains the total fine amounts for each violation type across all the years, sorted by the sum of fines.



## Input file example for task 1

```
<persons>
    <person name="Іван" surname="Котляревський" birthDate="09.09.1769" />
    <person surname="Шевченко" name="Тарас" birthDate="09.03.1814" />
    <person
            birthDate="27.08.1856"
            name = "Іван"
            surname = "Франко" />
    <person name="Леся"
            surname="Українка"
            birthDate="13.02.1871" />
</persons>
```

## Output file example for task 1

```
<?xml version="1.0" encoding="utf-8"?>
<persons>
<person name="Іван Котляревський" birthDate="09.09.1769"/>
<person name="Тарас Шевченко" birthDate="09.03.1814"/>
<person name="Іван Франко" birthDate="27.08.1856"/>
<person name="Леся Українка" birthDate="13.02.1871"/>
</persons>

```

## Input file example for task 2

```
[
  {
    "date_time": "2020-05-05 15:39:03",
    "first_name": "Ivan",
    "last_name": "Ivanov",
    "type": "SPEEDING",
    "fine_amount": 340.00
  },
  {
    "date_time": "2020-06-08 15:39:03",
    "first_name": "Ivan",
    "last_name": "Ivanov",
    "type": "DRUNK DRIVING",
    "fine_amount": 690.00
  },
  {
    "date_time": "2020-07-09 15:39:03",
    "first_name": "Ivan",
    "last_name": "Ivanov",
    "type": "LACK OF DOCUMENTS",
    "fine_amount": 700.00
  }
]

```

## Output file example for task 2

```
<?xml version="1.0"?>
<violations>
<violation>
        <type>LACK OF DOCUMENTS</type>
        <amount>4200</amount>
</violation>
<violation>
        <type>DRUNK DRIVING</type>
        <amount>4140</amount></violation>
<violation>
        <type>SPEEDING</type>
        <amount>2720</amount>
</violation>
</violations>


```