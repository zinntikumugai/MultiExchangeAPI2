# Multi Exchange API v2

## Support Exchange
`\MEAPI2\Model\***`

| Exchange | ClassName |
|:---------|:----------|
| Zaif | zaif |
| C-CEX | ccex |

## How to use
### install
```
composer require zinntikumugai/multi-exchange-api2
```
### use
```
var_dump(
    mpyw\Co\Co::wait([
        \MEAPI2\Model\zaif::pair()
    ])
);
```