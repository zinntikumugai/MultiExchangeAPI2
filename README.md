# Multi Exchange API v2

## Support Exchange
`\MEAPI2\Model\***`

| Exchange | ClassName |
|:---------|:----------|
| Zaif | zaif |
| C-CEX | ccex |

## How to use
```
require_once __DIR__ .'/src/AutoLoader.php';

var_dump(
    mpyw\Co\Co::wait([
        \MEAPI2\Model\zaif::pair()
    ])
);
```