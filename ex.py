import tkinter
app=tkinter.Tk()
zone_texte=tkinter.Label(text="zone de texte")
zone_texte.config(text= "second texte")
zone_texte.config(state= tkinter.DISABLED)
zone_texte.config(state= tkinter.NORMAL)

bouton=tkinter.Button(text="bouton")
bouton.config(text= "second bouton")
bouton.config(state= tkinter.DISABLED)
bouton.config(state= tkinter.NORMAL)


bouton2=tkinter.Button()
im =tkinter.PhotoImage(file="C:\\Users\\epi.edu.EPI\\Pictures\\im2.gif")
bouton2.config(image=im)


texte=tkinter.Entry()
texte.insert('1','une nouvelle information')
contenu=texte.get()
print(contenu)
#texte.delete(0,5)
#texte.delete(0,len(contenu))
texte.config(state =tkinter.DISABLED)

zone_texte.pack()
bouton.pack()
bouton2.pack()
texte.pack()
app.mainloop()

