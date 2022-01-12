from cryptography.fernet import Fernet

file = open('key.key', 'rb')
key = file.read()
file.close()

message = "Nur Hamdalah Kahfi"
encoded = message.encode()

f = Fernet(key)
encrypted = f.encrypt(encoded)
print("encrypt process : ")
print (encrypted)

file = open('key.key', 'rb')
key2 = file.read()
file.close

f2 = Fernet(key)
decrypted = f2.decrypt(encrypted)

print("decrypt process : ")
print (decrypted)

original_message = decrypted.decode()
print("original Message : ")
print(original_message)

    
