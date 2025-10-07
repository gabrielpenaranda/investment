
---

### **1. Use an Existing Account in ZeptoMail**
If you don’t already have a ZeptoMail account, sign up at [ZeptoMail](https://www.zetpostmail.com/). If you already have an account, log in to your dashboard.

---


### **2. Generate the `SEND_MAIL_TOKEN`**
The `SEND_MAIL_TOKEN` is an authentication token used by ZeptoMail to allow your Laravel application to send emails. To generate this token:

1. Go to the "API Keys" section in the ZeptoMail dashboard.
2. Click "Generate API Key."
3. Copy the generated token. This will be your `SEND_MAIL_TOKEN`.

> **Important Note**: Save this token in a secure place because you won’t be able to retrieve it later. If you lose it, you’ll need to generate a new one.
