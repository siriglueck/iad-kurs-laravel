# 👨‍🎓 **Teilnehmer-Version: Sicherer Workflow für Campusmanager & Librarymanager**

## Campusmanager oder Librarymanager im VS Code öffnen

Wechsel ins Kursverzeichnis:

```bash
cd ~/laravel
```

### Campusmanager öffnen

```bash
code campusmanager
```

### Librarymanager öffnen

```bash
code librarymanager
```

VS Code zeigt dann **nur dieses Projekt** an.
Der Git-Tab funktioniert trotzdem.

---

## Am Tagesende Änderungen hochladen

```bash
cd ~/laravel
git add .
git commit -m "Tag X abgeschlossen"
git push
```

---

## Optional (bequem)

Alias-Befehle:

```bash
alias cm='code ~/laravel/campusmanager'
alias lm='code ~/laravel/librarymanager'
```

Danach:

* `cm` → Campusmanager öffnen
* `lm` → Librarymanager öffnen
