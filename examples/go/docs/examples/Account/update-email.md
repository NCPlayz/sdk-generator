# Account Examples

## UpdateEmail

```go
    package appwrite-updateemail

    import (
        "fmt"
        "os"
        "github.com/appwrite/go-sdk"
    )

    func main() {
        // Create a Client
        var clt := appwrite.Client{}

        // Set Client required headers
        clt.SetProject("")

        // Create a new Account service passing Client
        var srv := appwrite.Account{
            client: &clt
        }

        // Call UpdateEmail method and handle results
        var res, err := srv.UpdateEmail("email@example.com", "password")
        if err != nil {
            panic(err)
        }

        fmt.Println(res)
    }
```