#!/usr/bin/env python
# pylint: disable=unused-argument
# This program is dedicated to the public domain under the CC0 license.

"""
Simple Bot to reply to Telegram messages.

First, a few handler functions are defined. Then, those functions are passed to
the Application and registered at their respective places.
Then, the bot is started and runs until we press Ctrl-C on the command line.

Usage:
Basic Echobot example, repeats messages.
Press Ctrl-C on the command line or send a signal to the process to stop the
bot.
"""

import logging
import platform
import ping3
import socket

from telegram import ForceReply, Update
from telegram.ext import Application, CommandHandler, ContextTypes, MessageHandler, filters
from telegram.ext import CallbackContext

# Enable logging
logging.basicConfig(
    format="%(asctime)s - %(name)s - %(levelname)s - %(message)s", level=logging.INFO
)
# set higher logging level for httpx to avoid all GET and POST requests being logged
logging.getLogger("httpx").setLevel(logging.WARNING)

logger = logging.getLogger(__name__)


# Define a few command handlers. These usually take the two arguments update and
# context.
async def start(update: Update, context: ContextTypes.DEFAULT_TYPE) -> None:
    """Send a message when the command /start is issued."""
    user = update.effective_user
    await update.message.reply_html(
        rf"Hi {user.mention_html()}!",
        reply_markup=ForceReply(selective=True),
    )
    await update.message.reply_text("Hola soy Combot, el robot de lucha de Tekken 4 /help es tu amigo")


async def info_command(update: Update, context: ContextTypes.DEFAULT_TYPE) -> None:
    """Send a message when the command /info is issued."""
    await update.message.reply_text("Hola soy Combot, el robot de lucha de Tekken 4 /help es tu amigo")

async def help(update: Update, context: ContextTypes.DEFAULT_TYPE) -> None:
    """Send a message when the command /help is issued."""
    await update.message.reply_text(f"/host te dice el sistema \n"
                                    f"/help te muestra la ayuda \n"
                                    f"/info te da la información que necesitas \n"
                                    f"/ping + ip hace un ping a la direccion indicada \n"
                                    f"/red te da la interfaz de red \n"
                                    f"/start arranca el bot \n"
                                    f"Si vuelves a preguntar te pego una paliza, al Tekken \n"
                                    )

# host-info
async def host_info(update: Update, context: ContextTypes.DEFAULT_TYPE) -> None:
    """Send a message when the command /info is issued."""
    sistema = platform.system()
    await update.message.reply_text("Estamos en {}".format(sistema))

# red
async def red(update: Update, context: ContextTypes.DEFAULT_TYPE) -> None:
    """Send a message when the command /red is issued."""
    s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
    s.connect(("8.8.8.8", 80)) 
    ip = (s.getsockname()[0])
    await update.message.reply_text(f"La IP es {ip}")
    s.close()

# ping
from telegram import Update
from telegram.ext import CallbackContext
import ping3

async def ping(update: Update, context: CallbackContext):
    """Send a message when the command /ping is issued."""
    ip_address = context.args[0]
    try:
        ping_result = ping3.ping(ip_address)
        if ping_result is not None:
            if ping_result is not False:
                response = f"Success - Round-Trip Time: {ping_result} ms"
            else:
                response = f"Niet"     
        else:
            response = "Fallo - Ping no responde"
    except:
        print("Failed")
    await update.message.reply_text(response)



async def echo(update: Update, context: ContextTypes.DEFAULT_TYPE) -> None:
    """Echo the user message."""
    await update.message.reply_text(update.message.text)


def main() -> None:
    """Start the bot."""
    # Create the Application and pass it your bot's token.
    application = Application.builder().token("6637661171:AAE_QVeE5VZ2U49I-AcEBPt3hY62LVps6Tg").build()

    # on different commands - answer in Telegram
    application.add_handler(CommandHandler("start", start))
    application.add_handler(CommandHandler("info", info_command))
    application.add_handler(CommandHandler("host", host_info))
    application.add_handler(CommandHandler("ping", ping))
    application.add_handler(CommandHandler("help", help))
    application.add_handler(CommandHandler("red", red))

    # on non command i.e message - echo the message on Telegram
    application.add_handler(MessageHandler(filters.TEXT & ~filters.COMMAND, echo))

    # Run the bot until the user presses Ctrl-C
    application.run_polling(allowed_updates=Update.ALL_TYPES)


if __name__ == "__main__":
    main()