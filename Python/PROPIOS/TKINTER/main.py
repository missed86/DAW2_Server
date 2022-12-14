from tkinter import *

root = Tk()

etiqueta = Label(root, text= "Hola mundo")
etiqueta.grid(row=0, column=0)
etiqueta2 = Label(root, text= "Hola mundo")
etiqueta2.grid(row=0, column=1)

marco_principal = Frame()
marco_principal.config(width='800', height='600', bg='grey')

def click_boton():
    text = Label(root, text="Me has pulsado").grid()

# etiqueta.pack()
marco_principal.grid(row=1, columnspan=2)
boton1 = Button(marco_principal, text="Pulsame", command=click_boton)
boton1.pack()

root.mainloop()