# SparkIntern
## SQL Query
### Info Table

```sql
CREATE TABLE `info` (
  `Id` int(3) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Balance` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4
```
<table>
    <tbody>
        <tr>
            <th style="text-align: center;" width="50">Id</th>
            <th style="text-align: center;" width="146">Name</th>
            <th style="text-align: center;" width="146">Email</th>
            <th style="text-align: center;" width="146">Balance</th>
        </tr>
        <tr>
            <td style="text-align: center;" width="50">1</td>
            <td style="text-align: center;" width="146">Suman Vij</td>
            <td style="text-align: center;" width="146">sumanvij1@gmail.com</td>
            <td style="text-align: center;" width="146">50000</td>
        </tr>
    </tbody>
</table>

### Transaction Table
```sql
CREATE TABLE `transaction` (
  `sno` int(3) NOT NULL AUTO_INCREMENT,
  `sender` text NOT NULL,
  `receiver` text NOT NULL,
  `Balance` int(8) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4
```
<table>
    <tbody>
        <tr>
            <th style="text-align: center;" width="50">sno</th>
            <th style="text-align: center;" width="146">sender</th>
            <th style="text-align: center;" width="146">receiver</th>
            <th style="text-align: center;" width="146">Balance</th>
            <th style="text-align: center;" width="180">datetime</th>
        </tr>
        <tr>
            <td style="text-align: center;" width="50">1</td>
            <td style="text-align: center;" width="146">Suman Vij</td>
            <td style="text-align: center;" width="146">Renuka R</td>
            <td style="text-align: center;" width="146">200</td>
            <td style="text-align: center;" width="180">2022-01-12 20:47:16</td>
        </tr>
    </tbody>
</table>
